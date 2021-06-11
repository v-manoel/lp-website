<?php

include '../model/negocio/ClassProduct.php';
include '../../src/classes/Render.php';

class ControllerPayment extends Render{


    public function __construct(){
        $this->setTitle("La Pechincha Brasil");
        $this->setDesc("Carrinho de itens selecionado");
        $this->setKeywords("cart, carrinho, itens, sacola");
        $this->setDir("payment");
        $this->renderLayout();
    }

    public function exibir(){
        echo "oi";
    }

    public function addMain()
    {
        $teste2 = "Testando denovo";

        if(file_exists(DIRREQ."app/view/{$this->getDir()}/Preview.php")){
            require(DIRREQ."app/view/{$this->getDir()}/Preview.php");
        }
        
    }


}