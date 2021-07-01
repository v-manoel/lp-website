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
            $_genre =$customer->getGenre() == "Masculino" ? 'M' : ("Feminino" ? 'F' : "");
            $_birthday = $customer->getBirthday();


            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function selectById(Customer $customer, bool $only_active = true){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM users WHERE email = :email AND pswd = :pswd");
            $stmt->bindParam(":email",$_email);
            $stmt->bindParam(":pswd",$_pswd);
            
            $_email = $customer->getEmail();
            $_pswd = $customer->getPswd();

            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row['department'] == null && !$only_active || $row['is_active'] == $only_active){
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

    public function select(Customer $generic_customer, bool $only_active = true){
        
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM users WHERE name LIKE :name 
            AND cpf LIKE :cpf AND email LIKE :email AND phone LIKE :phone
            AND genre LIKE :genre AND birthday LIKE :birthday");
            $stmt->bindParam(":name",$_name);
            $stmt->bindParam(":cpf",$_cpf);
            $stmt->bindParam(":email",$_email);
            $stmt->bindParam(":phone",$_phone);
            $stmt->bindParam(":genre",$_genre);
            $stmt->bindParam(":birthday",$_birthday);
            
            $_phone = '%'.$generic_customer->getPhone().'%';
            $_genre =$generic_customer->getGenre() == "Masculino" ? 'M' : ("Feminino" ? 'F' : "");
            $_birthday = '%'.$generic_customer->getBirthday().'%';
            $_name = '%'. $generic_customer->getName() .'%';
            $_cpf = '%'. $generic_customer->getCpf() .'%';
            $_email = '%'. $generic_customer->getEmail() .'%';
            
            $stmt->execute();

            $customers = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['department'] == null && !$only_active || $row['is_active'] == $only_active){
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

    public function delete(Customer $customer)
    {
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("UPDATE users SET is_active = 0 WHERE cpf=:cpf");
            $stmt->bindParam(":cpf",$_cpf);
            
            $_cpf = $customer->getCpf();
            $stmt->execute();    

        }catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function update(Customer $customer)
    {
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("UPDATE users SET name=:name, email=:email, pswd=:pswd, phone=:phone, genre=:genre, birthday=:birthday WHERE cpf=:cpf");
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
            $_genre =$customer->getGenre() == "Masculino" ? 'M' : ("Feminino" ? 'F' : "");
            $_birthday = $customer->getBirthday();
            

            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }
}