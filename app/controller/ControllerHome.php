<?php

require_once __DIR__."/../model/negocio/Product.php";
require_once __DIR__."/../model/negocio/Category.php";
require_once __DIR__."/../model/negocio/Customer.php";

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

        $prod_base->setOffer(0.6);
        $inoffer = $prod_base->all();

      
        $cat->setName("Frios");
        $cat = $cat->findByName();
        $bycategory[0] = $prod_base->allByCategory($cat);

        $cat->setName("Games");
        $cat = $cat->findByName();
        $bycategory[1] = $prod_base->allByCategory($cat);
        

        if(file_exists(DIRREQ."app/view/{$this->getDir()}/Main.php")){
            require(DIRREQ."app/view/{$this->getDir()}/Main.php");
        }
    }
}