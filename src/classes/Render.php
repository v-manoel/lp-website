<?php
//renderizar projeto

abstract class Render{

    protected $dir;
    protected $title;
    protected $desc;
    protected $keywords;
    protected $content;

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
        require_once __DIR__."/../../app/model/negocio/Category.php";
        $cat = new Category();
        $categories = $cat->all();
        shuffle($categories);
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

    //Exibe uma página para exibir informacoes de redirecionamento para o usuario
    public function messagePage($message="",$dest_page="",$must_render = true){
        if($must_render){
            $this->renderLayout();
        }
        echo '
        <div class="h-100 row align-items-center" >
        <div class="position-absolute top-0 col text-center" tabindex="999">

            <div class="card mx-auto shadow-lg" style="max-width: 564px; margin-top: 15%">
            <div class="card-header text-right my-bg-dark">
                <h5 class="card-title m-auto text-center text-warning">Messagem Informativa</h5>
                <a class=" position-absolute top-0 mt-1" style="right: 6px;" href = "'.$dest_page.'">
                <i class="bi bi-x h2 font-weight-bolder text-white"></i>
                </a>
            </div>
            <div class="card-body mt-4">
                <h6>'.$message.'</h6>
            </div>
            <div class="text-end p-2">
                <a type="button" class="btn btn-warning p-1" href =" '.$dest_page.'">OK</a>
            </div>
            </div>
        </div>

        </div>';

        }
}

?>