<?php

include '../model/negocio/ClassProduct.php';
include '../../src/classes/Render.php';

class ControllerProdInfo extends Render{

    public function __construct(){
        $this->setTitle("La Pechincha Brasil");
        $this->setDesc("Descrição e caracteristicas do produto selecionado");
        $this->setKeywords("produto, caracteristicas, descrição");
        $this->setDir("product-info");
        $this->renderLayout();
    }

    public function exibir(){
        
    }

    public function addMain()
    {
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/Main.php")){
            require(DIRREQ."app/view/{$this->getDir()}/Main.php");
        }
    }
}