<?php

require_once __DIR__."/Connection.php";
require_once __DIR__."/../negocio/Customer.php";


class CustomerDao{

    public function insert(Customer $customer){
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("INSERT INTO users(name,cpf,email,pswd,phone,genre,birthday) values(:name, :cpf, :email, :pswd, :phone, :genre, :birthday)");
            $stmt->bindParam(":name",$_name);
            $stmt->bindParam(":cpf",$_cpf);
            $stmt->bindParam(":email",$_email);
            $stmt->bindParam(":pswd",$_pswd);
            $stmt->bindParam(":phone",$_phone);
            $stmt->bindParam(":genre",$_genre);
            $stmt->bindParam(":birthday",$_birthday);

            $_name = $customer->getName();
            $_cpf = $customer->getCpf();
            $_email = $customer->getEmail();
            $_pswd = $customer->getPswd();
            $_phone = $customer->getPhone();
            $_genre =$customer->getGenre() == "Masculino" ? 'M' : 'F';
            $_birthday = $customer->getBirthday();


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
            $stmt->bindParam(":email",$_email);
            $stmt->bindParam(":pswd",$_pswd);
            
            $_email = $customer->getEmail();
            $_pswd = $customer->getPswd();

            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row['department'] == null){
                    $customer->setCpf($row['cpf']);
                    $customer->setName($row['name']);
                    $customer->setPhone($row['phone']);
                    $customer->setGenre($row['genre']);
                    $customer->setBirthday($row['birthday']);

                    return $customer;
                }
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public function select(Customer $generic_customer){
        
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM users WHERE name like :name 
            and cpf like :cpf and email like :email and phone like :phone
            and genre like :genre and birthday like :birthday");
            $stmt->bindParam(":name",$_name);
            $stmt->bindParam(":cpf",$_cpf);
            $stmt->bindParam(":email",$_email);
            $stmt->bindParam(":phone",$_phone);
            $stmt->bindParam(":genre",$_genre);
            $stmt->bindParam(":birthday",$_birthday);
            
            $_phone = '%'.$generic_customer->getPhone().'%';
            $_genre =$generic_customer->getGenre() == "Masculino" ? 'M' : 'F';
            $_birthday = '%'.$generic_customer->getBirthday().'%';
            $_name = '%'. $generic_customer->getName() .'%';
            $_cpf = '%'. $generic_customer->getCpf() .'%';
            $_email = '%'. $generic_customer->getEmail() .'%';
            
            $stmt->execute();

            $customers = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['department'] == null){
                    $customer = new Customer();
                    $customer->setCpf($row['cpf']);
                    $customer->setEmail($row['email']);
                    $customer->setName($row['name']);
                    $customer->setPhone($row['phone']);
                    $customer->setGenre($row['genre']);
                    $customer->setBirthday($row['birthday']);
                
                    array_push($customers,$customer);
                }
            }

            return $customers;

        } catch(PDOException $err){
            return array();
        }
        
    }

    public function delete($customer)
    {
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("DELETE FROM users WHERE cpf=:cpf");
            $stmt->bindParam(":cpf",$_cpf);
            $_cpf = $customer->getCpf();

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
            
            $stmt = $con->prepare("UPDATE users SET name=:name, cpf=:cpf, email=:email, pswd=:pswd, phone=:phone, genre=:genre, birthday=:birthday WHERE cpf=:cpf)");
            $stmt->bindParam(":name",$_name);
            $stmt->bindParam(":cpf",$_cpf);
            $stmt->bindParam(":email",$_email);
            $stmt->bindParam(":pswd",$_pswd);
            $stmt->bindParam(":phone",$_phone);
            $stmt->bindParam(":genre",$_genre);
            $stmt->bindParam(":birthday",$_birthday);

            $_name = $customer->getName();
            $_cpf = $customer->getCpf();
            $_email = $customer->getEmail();
            $_pswd = $customer->getPswd();
            $_phone = $customer->getPhone();
            $_genre =$customer->getGenre() == "Masculino" ? 'M' : 'F';
            $_birthday = $customer->getBirthday();
            

            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }
}