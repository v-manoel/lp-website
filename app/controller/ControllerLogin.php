<?php

require_once __DIR__."/../model/negocio/Customer.php";

session_start();
class ControllerLogin extends Render{

    public function __construct(){
        if(!isset($_SESSION['user_login']) && !isset($_COOKIE['user_login'])){
            $this->setTitle("La Pechincha Brasil");
            $this->setDesc("Página inicial do sistema");
            $this->setKeywords("inicio, home, pagina inicial");
            $this->setDir("login");
            $this->renderLayout();
        }else{
            header('Location:'.DIRPAGE.'home', true,302);
        }

    }

    public function logar(){

        if(isset($_POST['email']) && isset($_POST['pswd'])){
            $customer = new Customer();
            $customer->setEmail($_POST['email']);
            $customer->setPswd($_POST['pswd']);

            if($customer->checkCredentials()){
                $_SESSION['user_login'] = serialize($customer);
                
                if(isset($_POST['manterlogado'])){
                    setcookie("user_login",serialize($customer),time() + 5);
                }

                header('Location:'.DIRPAGE.'home', true,302);
            }else{
                echo "<script>alert('Senha ou Email incorretos !')</script>";
            }
        }else{
            header('Location:'.DIRPAGE.'home', true,302);
        }

    }

    public function register(){
        $customer = new Customer();
        $customer->setName($_POST['name_cad']);
        $customer->setEmail($_POST['email_cad']);
        $customer->setPswd($_POST['pswd_cad']);
        $customer->setCpf($_POST['cpf_cad']);

        if($customer->insert()){
            echo "<script>alert('Usuário Cadastrado com sucesso !')</script>";
            sleep(2);
            $_SESSION['user_login'] = serialize($customer);
            header('Location:'.DIRPAGE.'home', true,302);
        }else{
            echo "<script>alert('Dados Invalidos !')</script>";
            sleep(2);
            header('Location:'.DIRPAGE.'login', true,302);
        }
    }

    public function renderLayout(){
        //Builds a page without a predefined layout
        $this->addHead();
        $this->addHeader();
        $this->addMain();
        $this->addFooter();
    }
}