<?php

require_once __DIR__."/../model/negocio/Product.php";
require_once __DIR__."/../model/negocio/Category.php";

session_start();

class ControllerHome extends Render{

    public function __construct(){
        $this->setTitle("La Pechincha Brasil");
        $this->setDesc("Página inicial do sistema");
        $this->setKeywords("inicio, home, pagina inicial");
        $this->setDir("home");
        $this->renderLayout();
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

    public function addMain()
    {
        $prod_base = new Product();
        $cat = new Category();

        if(file_exists(DIRREQ."app/view/{$this->getDir()}/Main.php")){
            require(DIRREQ."app/view/{$this->getDir()}/Main.php");
        }
    }
}