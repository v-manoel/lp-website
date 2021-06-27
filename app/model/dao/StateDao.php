<?php

require_once __DIR__."/Connection.php";
require_once __DIR__."/../negocio/State.php";

class StateDao{


    public function insert(State $state){
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("INSERT INTO bd_pechincha.states(uf) values(:uf)");
            $stmt->bindParam(":uf", $_uf);

            $_uf= $state->getUf();

            $stmt->execute();

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

    
    public function selectById(State $state){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM states WHERE id = :id");
            $stmt->bindParam(":id",$_id);
            
            $_id = $state->getId();

            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $state->setUf($row['uf']);

                return $state;
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public function selectByUf(State $state){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM states WHERE uf = :uf");
            $stmt->bindParam(":uf",$_uf);
            
            $_uf = $state->getUf();

            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $state->setId($row['id']);

                return $state;
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public function select(State $generic_city){
        
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM states WHERE uf LIKE :uf ");
            $stmt->bindParam(":uf",$_uf);
            
            $_uf = '%'. $generic_city->getUf() .'%';
            
            $stmt->execute();

            $states = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $state = new State();
                $state->setId($row['id']);
                $state->setUf($row['uf']);

                array_push($states,$state);
            }


            return $states;

        } catch(PDOException $err){
            return array();
        }
        
    }

    public function delete(State $state)
    {
        try{
            $con = Connection::getConnection();
            
            //Delete all products relations
            $prod_stmt = $con->prepare("DELETE FROM addresses WHERE id_city = :id_city");
            $prod_stmt->bindParam(":id_city", $state->getId());
            $prod_stmt->execute();
                
            $stmt = $con->prepare("DELETE FROM states WHERE id=:id");
            $stmt->bindParam(":id",$_id);

            $_id = $state->getId();

            $stmt->execute();    
        }catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function update(State $state)
    {
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("UPDATE states SET uf=:uf WHERE id=:id)");
            $stmt->bindParam(":id",$_id);
            $stmt->bindParam(":uf",$_uf);

            $_uf = $state->getUf();
            $_id = $state->getId();

            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }


}