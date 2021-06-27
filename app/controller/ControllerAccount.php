<?php


require_once __DIR__."/../model/negocio/CustomerAccount.php";

class ControllerAccount extends Render{
    private $requested_page;
    private $customer;

 

    public function __construct(){
        if(isset($_SESSION['user_login']) || isset($_COOKIE['user_login'])){
            $this->setTitle("La Pechincha Brasil");
            $this->setDesc("Página inicial do sistema");
            $this->setKeywords("inicio, home, pagina inicial");
            $this->setDir("cliente");

            $this->customer = new CustomerAccount(unserialize($_SESSION['user_login']));
        }else{
            header('Location:'.DIRPAGE.'login', true,302);
        }
    }


    public function page($data){
        switch ($data) {
            case 'myData':
                $this->requested_page = "Dados";
                break;
            case 'myCards':
                $this->requested_page = "Cartoes";
                break;
            case 'myAddress':
                $this->requested_page = "Enderecos";
                if(count($this->customer->getAddresses()) == 0){
                    $dest_page = DIRPAGE.'account/page/newAddress';
                    $this->messagePage("Você não possui nenhum endereço cadastrado ! <br> <br> 
                    Clique no botão abaixo <br> para cadastrar um novo ponto de entrega",$dest_page );
                }
                break;
            case 'myOrders':
                $this->requested_page = "Compras";
                break;
            case 'myRegister':
                $this->requested_page = "Registro";
                break;
            case 'submitAddress':
                $this->submitAddress();
                $this->requested_page = "Enderecos";
                break;
            case 'newAddress':
                $this->LoadFormFields();
                $this->requested_page = "FormEndereco";
                break;
            case 'newCard':
                $this->requested_page = "FormCartao";
                break;
            case 'addCard':
                $this->saveCard();
                $this->requested_page = "Cartoes";
                break;
            case 'delCard':
                $this->deleteCard();
                $this->requested_page = "Cartoes";
                break;
            case 'delete':
                $this->deleteUser();
                header('Location:'.DIRPAGE.'home', true,302);
                break;
        
            default:
                $this->requested_page = "Dados";
                break;
        }
        $this->renderLayout();
    }

    public function deleteCard(){
        if(isset($_POST['card-id'])){
            $card =  new CreditCard();
            $card->setNumber($_POST['card-id']);
            $card->findByID();
            $this->customer->deleteCredcard($card);
        }
    }

    public function saveCard(){
        $card = new CreditCard();
        if(isset($_POST['card-holder']))
            $card->setHolder($_POST['card-holder']);
        if(isset($_POST['card-number']))
            $card->setNumber($_POST['card-number']);
        if(isset($_POST['card-cvv']))
            $card->setCvv($_POST['card-cvv']);
        if(isset($_POST['card-expiration']))
            $card->setExpiration($_POST['card-expiration']);

        $this->customer->addCredcard($card);
    }
    
    public function LoadFormFields(){

        $addr = new Address();
        if(isset($_POST['addr-id'])){
            $addr->setId($_POST['addr-id']);
            if(isset($_POST['addr-name']))
                $addr->setName($_POST['addr-name']);
            if(isset($_POST['addr-destinatary']))
                $addr->setDestinatary($_POST['addr-destinatary']);
            if(isset($_POST['addr-street']))
                $addr->setStreet($_POST['addr-street']);
            if(isset($_POST['addr-number']))
                $addr->setNumber($_POST['addr-number']);
            if(isset($_POST['addr-city'])){
                $city = new City();
                $city->setName($_POST['addr-city']);
                $city->findByName();
                $addr->setCity($city);
            }
            if(isset($_POST['addr-cep']))
                $addr->setCep($_POST['addr-cep']);
            if(isset($_POST['addr-district']))
                $addr->setDistrict($_POST['addr-district']);
            if(isset($_POST['addr-desc']))
                $addr->setDescription($_POST['addr-desc']);
        }

        $state = new State();
        $this->content['states'] = $state->all();
        $this->content['addr'] = $addr;

    }

    public function dataUpdate(){
        $fname = $this->customer->getCustomer()->NamePieces()[0];
        $lname = $this->customer->getCustomer()->NamePieces()[1];
        if(isset($_POST['fname'])){
            $fname = $_POST['fname'];
        }
        if(isset($_POST['lname'])){
            $lname = $_POST['lname'];
        }
        if(isset($_POST['email'])){
            $this->customer->getCustomer()->setEmail($_POST['email']);
        }
        if(isset($_POST['genre'])){
            $this->customer->getCustomer()->setGenre($_POST['genre']);
        }
        if(isset($_POST['birthday'])){
            $this->customer->getCustomer()->setBirthday($_POST['birthday']);
        }
        if(isset($_POST['phone'])){
            $this->customer->getCustomer()->setPhone($_POST['phone']);
        }

        $this->customer->getCustomer()->setName($fname.' '.$lname);

        //try to update database register reference
        if($this->customer->getCustomer()->update()){

            //updates user' session reference
            $_SESSION['user_login'] = serialize($this->customer->getCustomer());
       
            $dest_page = DIRPAGE.'account/page/myRegister';
            $this->messagePage("Dados Atualizados com Sucesso !",$dest_page );
            
        }else{
            $dest_page = DIRPAGE.'account/page/myRegister';
            $this->messagePage("Erro no Processo de Atualização !",$dest_page );
        }
        
    }

    public function loginUpdate(){
        
        if($this->customer->getCustomer()->getPswd() == $_POST['lpswd']){

            if(isset($_POST['email'])){
                $this->customer->getCustomer()->setEmail($_POST['email']);
            }
            if(isset($_POST['npswd'])){
                $this->customer->getCustomer()->setPswd($_POST['npswd']);
            }
            
            if($this->customer->getCustomer()->update()){
            //updates user' session reference
            $_SESSION['user_login'] = serialize($this->customer->getCustomer());
            $dest_page = DIRPAGE.'account/page/myData';
            $this->messagePage("Dados Atualizados com Sucesso !",$dest_page );
            
            }else{
                $dest_page = DIRPAGE.'account/page/myRegister';
                $this->messagePage("Erro Interno no Banco de Dados!",$dest_page );
            }
        }       
        else{
            $dest_page = DIRPAGE.'account/page/myRegister';
            $this->messagePage("Senha Antiga não encontrada !",$dest_page );
        }
        
        
    }

    public function submitAddress(){
        $addr = new Address();

        $addr->setOwner($this->customer->getCustomer());

        if(isset($_POST['name'])){
            $addr->setName($_POST['name']);
        }
        if(isset($_POST['street'])){
            $addr->setStreet($_POST['street']);
        }
        if(isset($_POST['number'])){
            $addr->setNumber($_POST['number']);
        }
        if(isset($_POST['cep'])){
            $addr->setCep($_POST['cep']);
        }
        if(isset($_POST['city'])){
            $city = new City();
            $city->setId($_POST['city']);
            $city->findByID();
            $addr->setCity($city);
        }
        if(isset($_POST['district'])){
            $addr->setDistrict($_POST['district']);
        }
        if(isset($_POST['description'])){
            $addr->setDescription($_POST['description']);
        }
        if(isset($_POST['destinatary'])){
            $addr->setDestinatary($_POST['destinatary']);
        }
        //var_dump($addr);

        $dest_page = DIRPAGE.'account/page/myAddress';
        
        if($addr->getId()){
            //if($addr->update()){
            if($this->customer->changeAddress($addr)){
                $this->messagePage("Endereço atualizado com sucesso !",$dest_page );
            }
        }else{
            if($this->customer->addAddress($addr)){
                $this->messagePage("Endereço cadastrado com sucesso !",$dest_page );
            }
        }
        
    }

    public function deleteUser(){
    
        if(isset($_POST['del_pswd'])){
            if($_POST['del_pswd'] == $this->customer->getCustomer()->getPswd()){
                unset($_SESSION['user_login']); 
                if(isset($_COOKIE['user_login'])){
                    unset($_COOKIE['user_login']);
                    setcookie('user_login', null, -1, '/');
                }
                if($this->customer->getCustomer()->delete()){
                    $dest_page = DIRPAGE.'home';
                    $this->messagePage("Que pena que nos deixou ! <br> <br> 
                    Continue aproveitando o @lapechincha e suas ofertas imperdíveis",$dest_page );
                }
            }
        }

    }

    public function addMain()
    {
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/AccountLayout.php")){
            require(DIRREQ."app/view/{$this->getDir()}/AccountLayout.php");
        }
    }

    public function addSubPage(){
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/{$this->requested_page}.php")){
            require(DIRREQ."app/view/{$this->getDir()}/{$this->requested_page}.php");
        }
    }

    public function ajaxCall(){
        
        if(isset($_POST['state_id'])){
            $state  = new State();
            $state->setId($_POST['state_id']);
            $state->findByID();
            $cities = City::allByState($state);
            foreach ($cities as $city){
                echo '<option value="'.$city->getId().'">'. $city->getName() .'</option>';
           
            }
        }
    }
}