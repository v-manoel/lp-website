<?php

include '../src/classes/Routes.php';

class Dispatch extends Routes{
    
    private $method;
    private $param=[];
    private $controller;

    protected function getMethod(){return $this->method;}
    public function setMethod($method){$this->method = $method;}
    protected function getParam(){return $this->param;}
    public function setParam($param){$this->param = $param;}

    #metodo construtor
    public function __construct(){
        //direcionar para o add controller
        $this->addController();
    }

    #metodo de acição de controller
    private function addController(){
        $controller_name = $this->getRoute();
        require_once '../app/controller/'.$controller_name.'.php';
    
        //Retorna uma instancia do controller correspondente a rota
        $this->controller = new $controller_name;

        if(isset($this->url()[1])){
            $this->addMethod();
        }

    }

    #metodo de adicao de metodo do controller
    private function addMethod(){
        //verifica se o metodo do controller correspondente existe
        //o metodo é descrito pelo segundo argumento da url - apos o controller
        if(method_exists($this->controller, $this->url()[1])){
            $this->setMethod("{$this->url()[1]}");
            $this->addParam();
            //chama o metodo correspondente passando tambem os parametros indicados
            call_user_func_array([$this->controller,$this->getMethod()],$this->getParam());
        }else{
            
        }
    }

    #metodo de adicao de parametros do controller
    private function addParam(){
        $array_count = count($this->url());

        if($array_count > 2){
            foreach($this->url() as $Key => $Value){
                if($Key > 1){
                    $this->setParam($this->param += [$Key => $Value]);
                }
            }
        }else{
            
        }
    }
}

?>