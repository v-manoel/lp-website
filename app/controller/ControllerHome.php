<?php

include '../model/negocio/ClassProduct.php';
include '../../src/classes/Render.php';

class ControllerHome extends Render{

    public function __construct(){
        $this->setTitle("Página Inicial");
        $this->setDesc("Página inicial do sistema");
        $this->setKeywords("inicio, home, pagina inicial");
        $this->setDir("home");
        $this->renderLayout();
    }

    public function exibir(){
        
    }

    public function addMain()
    {
        $teste2 = "Testando denovo";
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/Main.php")){
            require(DIRREQ."app/view/{$this->getDir()}/Main.php");
        }
    }
}