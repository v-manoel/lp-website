<?php

require_once __DIR__."/Connection.php";
require_once __DIR__."/../negocio/CreditCard.php";
require_once __DIR__."/../negocio/Customer.php";


class AccountDao{


    public function insertUserCard(CreditCard $card, Customer $customer){
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("INSERT INTO bd_pechincha.user_has_card(card_number, user_cpf) values(:card_number, :user_cpf)");
            $stmt->bindParam(":card_number", $card_number);
            $stmt->bindParam(":user_cpf", $user_cpf);

            $card_number = $card->getNumber();
            $user_cpf = $customer->getCpf();


            $stmt->execute();

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

    
    public function deleteUserCard(CreditCard $card, Customer $customer){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("DELETE FROM user_has_card WHERE card_number = :card_number && user_cpf = :user_cpf");
            $stmt->bindParam(":card_number", $card_number);
            $stmt->bindParam(":user_cpf", $user_cpf);

            $card_number = $card->getNumber();
            $user_cpf = $customer->getCpf();

            $stmt->execute();

            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }


}