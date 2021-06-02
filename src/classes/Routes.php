<?php

class Routes{

    private $route;

    //Captura as informações da url
    public function url(){
        /*
        Acessa parâmetro url (definido no public htacess) da variável super global _GET
        Realiza-se o filtro do conteudo de url, removendo caracteres ilegais da url
        */
        $url = filter_input(INPUT_GET,"url",FILTER_SANITIZE_URL);
            
        //Verifica se a variável url possui conteudo, se existe url  
        if(isset($url)){
            //Remove espaços em branco e caracters especiais da url
            $url = trim(rtrim($url,'/'));
            //Transforma a url em um array de strings, usando a '/' como split token
            $url = explode('/',$url);

            return $url;
        }
    }

    #metodo de retorno da rota
    public function getRoute(){
        $url = $this->url();
        $index = $url[0];

        $this->route = array(
            ""=>"ControllerHome",
            "home"=>"ControllerHome",
            "product"=>"ControllerProdInfo",
            "busca"=>"ControllerBusca"
        );

        if(array_key_exists($index, $this->route)){//Se a url esta no array
            if(file_exists(DIRREQ."app/controller/{$this->route[$index]}.php")){//Se o arquivo correspondente existe
                return $this->route[$index];
            }else{
                return "ControllerHome";
            }
        }else{
            return "Controller404";
        }
    }
}

?>