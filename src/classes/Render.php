<?php
//renderizar projeto

abstract class Render{

    private $dir;
    private $title;
    private $desc;
    private $keywords;

    public function getDir(){return $this->dir;}
    public function setDir($dir){$this->dir = $dir;}

    public function getTitle(){return $this->title;}
    public function setTitle($title){$this->title = $title;}

    public function getDesc(){return $this->desc;}
    public function setDesc($desc){$this->desc = $desc;}

    public function getKeywords(){return $this->keywords;}
    public function setKeywords($keywords){$this->keywords = $keywords;}

    //metodo responsável por renderizar os layouts

    public function renderLayout(){
        require_once(DIRREQ."app/view/Layout.php");
    }

    //adiciona caracteristicas no head
    public function addHead(){
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/Head.php")){
            require(DIRREQ."app/view/{$this->getDir()}/Head.php");
        }
    }

    //adiciona caracteristicas no head
    public function addHeader(){
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/Header.php")){
            require(DIRREQ."app/view/{$this->getDir()}/Header.php");
        }
    }


    //adiciona caracteristicas no main
    
    public function addMain(){
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/Main.php")){
            require(DIRREQ."app/view/{$this->getDir()}/Main.php");
        }
    }

    //adiciona caracteristicas no footer
    public function addFooter(){
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/Footer.php")){
            require(DIRREQ."app/view/{$this->getDir()}/Footer.php");
        }
    }
}

?>