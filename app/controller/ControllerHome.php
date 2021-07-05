<?php

require_once __DIR__."/../model/negocio/Product.php";
require_once __DIR__."/../model/negocio/Category.php";
require_once __DIR__."/../model/negocio/Customer.php";
require_once __DIR__."/../model/negocio/Order.php";

class ControllerHome extends Render{

    public function __construct(){
        $this->setTitle("La Pechincha Brasil");
        $this->setDesc("Página inicial do sistema");
        $this->setKeywords("inicio, home, pagina inicial");
        $this->setDir("home");
        $this->renderLayout();
    }

    public function LoadHomeContent(){
        //Get Some Products in offer
        $prod_base = new Product();
        $cat = new Category();

        //Set Products with 60% off or more
        $prod_base->setOffer(0.6);
        $this->content["offer"] = $prod_base->all();

        //Get Some Categories Products
        $cat = new Category();
        $cat = $cat->all();

        //Set 3 random categories products
        shuffle($cat);
        $this->content["cat"] = array();
        array_push($this->content["cat"],[$cat[0]->getName() => $prod_base->allByCategory($cat[0])]);
        array_push($this->content["cat"],[$cat[1]->getName() => $prod_base->allByCategory($cat[1])]);
        array_push($this->content["cat"],[$cat[2]->getName() => $prod_base->allByCategory($cat[3])]);
    
    }

    public function addMain()
    {
        $this->LoadHomeContent();
        
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