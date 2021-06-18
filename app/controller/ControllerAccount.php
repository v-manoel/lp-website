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
        if(isset($_GET['fname'])){
            $fname = $_GET['fname'];
        }
        if(isset($_GET['lname'])){
            $lname = $_GET['lname'];
        }
        if(isset($_GET['email'])){
            $this->customer->getCustomer()->setEmail($_GET['email']);
        }
        if(isset($_GET['genre'])){
            $this->customer->getCustomer()->setGenre($_GET['genre']);
        }
        if(isset($_GET['birthday'])){
            $this->customer->getCustomer()->setBirthday($_GET['birthday']);
        }
        if(isset($_GET['phone'])){
            $this->customer->getCustomer()->setPhone($_GET['phone']);
        }

        $this->customer->getCustomer()->setName($fname.' '.$lname);
        
        //updates database register reference
        $this->customer->getCustomer()->update();

        //updates user' session reference
        $_SESSION['user_login'] = serialize($this->customer->getCustomer());
        
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