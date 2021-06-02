<?php

class Connection{
    #Realiza a conexao com o banco de dados
    
    public static function getConnection(){

        try {
            $con = new PDO("mysql:host=".HOST.";port=".PORT.";dbname=".DB."","".USER."","".PASS."");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;

        } catch (PDOException $err) {
            echo "Error!: ".$err->getMessage()."<br/>";
            return null;
        }
    }
}
