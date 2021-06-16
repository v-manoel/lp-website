<?php

require_once __DIR__."/Connection.php";
require_once __DIR__."/../negocio/Customer.php";


class CustomerDao{

    public function insert(Customer $customer){
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("INSERT INTO users(name,cpf,email,pswd) values(:name, :cpf, :email, :pswd)");
            $stmt->bindParam(":name",$customer->getName());
            $stmt->bindParam(":cpf",$customer->getCpf());
            $stmt->bindParam(":email",$customer->getEmail());
            $stmt->bindParam(":pswd",$customer->getPswd());

            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function selectById(Customer $customer){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM users WHERE email = :email and pswd = :pswd");
            $stmt->bindParam(":email",$customer->getEmail());
            $stmt->bindParam(":pswd",$customer->getPswd());
            
            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row['department'] == null){
                    $customer->setCpf($row['cpf']);
                    return $customer;
                }
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public function select(Customer $generic_customer){
        $_name = '%'. $generic_customer->getName() .'%';
        $_cpf = '%'. $generic_customer->getCpf() .'%';
        $_email = '%'. $generic_customer->getEmail() .'%';

        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM users WHERE _name like :
            name and cpf like :_cpf and email like :_email");
            $stmt->bindParam(":_name",$_name);
            $stmt->bindParam(":_cpf",$_cpf);
            $stmt->bindParam(":_email",$_email);
            
            $stmt->execute();

            $customers = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['department'] == "NULL"){
                    $customer = new Customer();
                    $customer->setCpf($row['cpf']);
                    $customer->setEmail($row['email']);
                    $customer->setName($row['name']);
                
                    array_push($customers,$customer);
                }
            }

            return $customers;

        } catch(PDOException $err){
            return array();
        }
        
    }

    public function delete($cpf)
    {
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("DELETE FROM users WHERE cpf=:cpf");
            $stmt->bindParam("cpf",$cpf);

            $stmt->execute();    
        }catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function update($customer)
    {
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("UPDATE users SET name=:name, cpf=:cpf, email=:email, pswd=:pswd WHERE cpf=:cpf)");
            $stmt->bindParam(":name",$customer->getName());
            $stmt->bindParam(":cpf",$customer->getCpf());
            $stmt->bindParam(":email",$customer->getEmail());
            $stmt->bindParam(":pswd",$customer->getPswd());

            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }
}