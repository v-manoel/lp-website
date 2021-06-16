<?php

require_once __DIR__."/../model/negocio/Product.php";
require_once __DIR__."/../model/negocio/Category.php";

class ControllerAccount extends Render{
    private $internal_page;

    public function __construct(){
        $this->setTitle("La Pechincha Brasil");
        $this->setDesc("Página inicial do sistema");
        $this->setKeywords("inicio, home, pagina inicial");
        $this->setDir("cliente");
       
    }

    public function logout(){
        if(isset($_SESSION['user_login']))
        {
            session_destroy();
            echo '<script>'.'window.location.reload()'.'</script>';
            $this->setDir("home");
            $this->renderLayout();
        }
    }

    public function mydata(){
        
        $this->internal_page = "Compras";
        $this->renderLayout();
    }

    public function main(){
        $this->internal_page = "Clientes";
        $this->renderLayout();
    }

    public function addMain()
    {
        
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/{$this->internal_page}.php")){
            require(DIRREQ."app/view/{$this->getDir()}/{$this->internal_page}.php");
        }
    }
}