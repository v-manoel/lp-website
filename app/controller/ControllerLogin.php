<?php

include '../model/negocio/ClassProduct.php';
include '../../src/classes/Render.php';

class ControllerLogin extends Render{

    public function __construct(){
        $this->setTitle("La Pechincha Brasil");
        $this->setDesc("Página inicial do sistema");
        $this->setKeywords("inicio, home, pagina inicial");
        $this->setDir("login");
        $this->renderLayout();
    }

    public function exibir(){
        echo "oi";
    }

    public function renderLayout(){
        //Builds a page without a predefined layout
        $this->addHead();
        $this->addHeader();
        $this->addMain();
        $this->addFooter();
    }
}