<?php
namespace App\model;

abstract class Connection{
    #Realiza a conexao com o banco de dados
    private $host = HOST;
    private $user = USER;
    private $pswd = PASS;
    private $db_name = DB;
    private $port = PORT;
    private $manager;
    private $stmt;

    public function __construct(){
        $db_info = 'mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->db_name;
        $options = [
            \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->manager = new \PDO($db_info, $this->user, $this->pswd, $options);

        } catch (\PDOException $err) {
            echo "Error!: ".$err->getMessage()."<br/>";
            die();
        }
    }

    public function query($sql){
        $this->stmt = $this->manager->prepare($sql);
    }

    public function bind($param, $value, $type){
        if(is_null($type)){
            switch (true){
                case is_int($value):
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;
                default:
                    $type = \PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param,$value,$type);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function result(){
        $this->execute();
        return $this->stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function results(){
        $this->execute();
        return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function numHits(){
        return $this->stmt->rowCount();
    }

    public function insertedId(){
        return $this->stmt->lastInsertId();
    }

}


?>