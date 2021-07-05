<?php

require_once __DIR__."/../model/negocio/Product.php";
require_once __DIR__."/../model/negocio/Customer.php";
require_once __DIR__."/../model/negocio/Category.php";
require_once __DIR__."/../model/negocio/Order.php";

class ControllerProdInfo extends Render{

    public function __construct(){
        //build a page only if there is a product id
        if(isset($_POST['product_id'])){
            $this->setTitle("La Pechincha Brasil");
            $this->setDesc("Descrição e caracteristicas do produto selecionado");
            $this->setKeywords("produto, caracteristicas, descrição");
            $this->setDir("product-info");
            $this->renderLayout();
        }else{
            return;
        }

    }


    public function addMain()
    {
        
        $product = new Product();
        $product->setId($_POST['product_id']);
        $product->findByID();
        $this->content['product'] = $product;

        $prod = new Product();
        $prod->setSource($this->content['product']->getSource());
        $this->content['source'] = $prod->all();

        $this->content['main-cat'] = $this->content['product']->allByCategory($this->content['product']->getCategories()[0]);
         

        if(file_exists(DIRREQ."app/view/{$this->getDir()}/Main.php")){
            require(DIRREQ."app/view/{$this->getDir()}/Main.php");
        }
    }
}