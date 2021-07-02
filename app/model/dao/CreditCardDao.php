<?php

require_once __DIR__."/Connection.php";
require_once __DIR__."/../negocio/CreditCard.php";


class CreditCardDao{


    public function insert(CreditCard $card){
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("INSERT INTO bd_pechincha.cards(number, holder, cvv, expiration) values(:number, :holder, :cvv, :expiration)");
            $stmt->bindParam(":number", $_number);
            $stmt->bindParam(":holder", $_holder);
            $stmt->bindParam(":cvv", $_cvv);
            $stmt->bindParam(":expiration", $_expiration);

            $_number = $card->getNumber();
            $_holder = $card->getHolder();
            $_cvv = $card->getCvv();
            $_expiration = $card->getExpiration().'-00';

            $stmt->execute();

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

    
    public function selectById(CreditCard $card, bool $only_active = true){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM cards WHERE number = :number");
            $stmt->bindParam(":number",$_number);
            
            $_number = $card->getNumber();

            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if(!$only_active || $row['is_active'] == $only_active){
                    $card->setHolder($row['holder']);
                    $card->setCvv($row['cvv']);
                    $card->setExpiration($row['expiration']);

                    return $card;
                }
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public function select(CreditCard $generic_card, bool $only_active = true){
        
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM cards WHERE number LIKE :number AND holder LIKE :holder AND cvv LIKE :cvv AND expiration LIKE :expiration");
            $stmt->bindParam(":number", $_number);
            $stmt->bindParam(":holder", $_holder);
            $stmt->bindParam(":cvv", $_cvv);
            $stmt->bindParam(":expiration", $_expiration);

            $_number = '%'.$generic_card->getNumber().'%';
            $_holder = '%'.$generic_card->getHolder().'%';
            $_cvv = '%'.$generic_card->getCvv().'%';
            $_expiration = '%'.$generic_card->getExpiration().'%';
            
            $stmt->execute();

            $cards = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if(!$only_active || $row['is_active'] == $only_active){
                    $card = new CreditCard();
                    $card->setNumber($row['number']);
                    $card->setHolder($row['holder']);
                    $card->setCvv($row['cvv']);
                    $card->setExpiration($row['expiration']);

                    array_push($cards,$card);
                }
            }


            return $cards;

        } catch(PDOException $err){
            return array();
        }
        
    }

    public function selectByCustomer(Customer $customer, bool $only_active = true){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM user_has_card WHERE user_cpf = :user_cpf");
            $stmt->bindParam(":user_cpf", $_user_cpf);
            
            $_user_cpf = $customer->getCpf();
            
            $stmt->execute();

            $cards = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $card = new CreditCard();
                $card->setNumber($row['card_number']);
                $card = $card->findByID($only_active);

                if($card)
                    array_push($cards,$card);
            }


            return $cards;

        } catch(PDOException $err){
            return array();
        }
        
    }

    public function delete(CreditCard $card)
    {
        try{

            $con = Connection::getConnection();
            $stmt = $con->prepare("UPDATE cards SET is_active = 0 WHERE number=:number");
            $stmt->bindParam(":number",$_number);
            
            $_number= $card->getNumber();
            $stmt->execute();  
   
        }catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function update(CreditCard $card)
    {
        try{
            $con = Connection::getConnection();

            $stmt = $con->prepare("UPDATE cards SET holder=:holder, cvv=:cvv, expiration=:expiration WHERE number=:number");
            $stmt->bindParam(":number", $_number);
            $stmt->bindParam(":holder", $_holder);
            $stmt->bindParam(":cvv", $_cvv);
            $stmt->bindParam(":expiration", $_expiration);

            $_number = $card->getNumber();
            $_holder = $card->getHolder();
            $_cvv = $card->getCvv();
            $_expiration = $card->getExpiration();

            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }


}