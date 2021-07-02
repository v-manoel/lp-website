<?php

require_once __DIR__."/Connection.php";
require_once __DIR__."/../negocio/City.php";
require_once __DIR__."/../negocio/State.php";

class CityDao{


    public function insert(City $city){
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("INSERT INTO bd_pechincha.cities(name, id_state) values(:name, :id_state)");
            $stmt->bindParam(":name", $_name);
            $stmt->bindParam(":id_state", $_id_state);

            $_name = $city->getName();
            $_id_state = $city->getState()->getId();

            $stmt->execute();

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

    
    public function selectById(City $city){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM cities WHERE id = :id");
            $stmt->bindParam(":id",$_id);
            
            $_id = $city->getId();

            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $city->setName($row['name']);
                $state = new State();
                $state->setId($row['id_state']);
                $city->setState($state->findByID());


                return $city;
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public function selectByName(City $city){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM cities WHERE name = :name");
            $stmt->bindParam(":name",$_name);
            
            $_name = $city->getName();

            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $city->setId($row['id']);
                $state = new State();
                $state->setId($row['id_state']);
                $city->setState($state->findByID());

                return $city;
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public  function selectByState(State $state)
    {
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM cities WHERE id_state = :id_state");
            $stmt->bindParam(":id_state", $_id_state);

            $_id_state = $state->getId();

            $stmt->execute();

            $cities = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $city = new City();
                $city->setId($row['id']);
                $city->setName($row['name']);
                $state = new State();
                $state->setId($row['id_state']);
                $city->setState($state->findByID());

                array_push($cities,$city);
            }


            return $cities;

        } catch(PDOException $err){
            return array();
        }
    }

    public function select(City $generic_city){
        
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM cities WHERE name LIKE :name  AND id_state LIKE :id_state");
            $stmt->bindParam(":name",$_name);
            $stmt->bindParam(":id_state", $_id_state);
            
            $_name = '%'. $generic_city->getName() .'%';
            $_id_state = $generic_city->getState() ? $generic_city->getState()->getId() : '%';

            $stmt->execute();

            $cities = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $city = new City();
                $city->setId($row['id']);
                $city->setName($row['name']);
                $state = new State();
                $state->setId($row['id_state']);
                $city->setState($state->findByID());

                array_push($cities,$city);
            }


            return $cities;

        } catch(PDOException $err){
            return array();
        }
        
    }

    public function delete(City $city)
    {
        try{
            $con = Connection::getConnection();
            
            //Delete all products relations
            $prod_stmt = $con->prepare("UPDATE addresses SET is_active = 0 WHERE id_city = :id_city");
            $prod_stmt->bindParam(":id_city", $city->getId());
            $prod_stmt->execute();
                
            $stmt = $con->prepare("DELETE FROM cities WHERE id=:id");
            $stmt->bindParam(":id",$_id);

            $_id = $city->getId();

            $stmt->execute();    
        }catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function update(City $city)
    {
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("UPDATE cities SET name=:name, id_state=:id_state WHERE id=:id)");
            $stmt->bindParam(":id",$_id);
            $stmt->bindParam(":name",$_name);
            $stmt->bindParam(":id_state", $_id_state);

            $_name = $city->getName();
            $_id = $city->getId();
            $_id_state = $city->getState()->getId();

            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }


}