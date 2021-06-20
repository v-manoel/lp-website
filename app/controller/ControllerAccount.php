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
                break;
            case 'myOrders':
                $this->requested_page = "Compras";
                break;
            case 'myRegister':
                $this->requested_page = "Registro";
                break;
        
            default:
                $this->requested_page = "Dados";
                break;
        }
        $this->renderLayout();
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
}