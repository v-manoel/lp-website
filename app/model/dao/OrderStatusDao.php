<?php

require '../negocio/OrderStatus.php';
require '../negocio/Order.php';
require './Connection.php';

class OrderStatusDao{


    public function insert($customer){
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("INSERT INTO customer(name,cpf,email,pswd) values(:name, :cpf, :email, :pswd)");
            $stmt->bindParam("name",$customer->getName());
            $stmt->bindParam("cpf",$customer->getCpf());
            $stmt->bindParam("email",$customer->getEmail());
            $stmt->bindParam("pswd",$customer->getPswd());

            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function select($generic_customer){
        $_name = '%'. $generic_customer->getName() .'%';
        $_cpf = '%'. $generic_customer->getCpf() .'%';
        $_pswd = '%'. $generic_customer->getPswd() .'%';
        $_email = '%'. $generic_customer->getEmail() .'%';

        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM customer WHERE _name like :
            name and cpf like :_cpf and pswd like :_pswd and email like :_email");
            $stmt->bindParam(":_name",$_name);
            $stmt->bindParam(":_cpf",$_cpf);
            $stmt->bindParam(":_pswd",$_pswd);
            $stmt->bindParam(":_email",$_email);
            
            $stmt->execute();

            $customers = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $customer = new Customer();
                $customer->setCpf($row['cpf']);
                $customer->setEmail($row['email']);
                $customer->setPswd($row['pswd']);
                $customer->setName($row['name']);
            
                array_push($customers,$customer);
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
            
            $stmt = $con->prepare("DELETE FROM customer WHERE cpf=:cpf");
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
            
            $stmt = $con->prepare("UPDATE customer SET name:=name, cpf:=cpf, email:=email, pswd:=pswd)");
            $stmt->bindParam("name",$customer->getName());
            $stmt->bindParam("cpf",$customer->getCpf());
            $stmt->bindParam("email",$customer->getEmail());
            $stmt->bindParam("pswd",$customer->getPswd());

            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }
}