<?php

require_once __DIR__."/Connection.php";
require_once __DIR__."/../negocio/Address.php";
require_once __DIR__."/../negocio/State.php";
require_once __DIR__."/../negocio/City.php";
require_once __DIR__."/../negocio/Customer.php";

class AddressDao{


    public function insert(Address $address){
        if($address->getOwner()){
            return $this->insertWithOwner($address);
        }else{
            return $this->insertNoOwner($address);
        }   
    }

    public function insertWithOwner(Address $address){
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("INSERT INTO bd_pechincha.addresses(street, district, number, description, cep, id_city, name, destinatary, user_cpf) values(:street, :district, :number, :description, :cep, :id_city, :name, :destinatary, :user_cpf)");
            $stmt->bindParam(":street", $_street);
            $stmt->bindParam(":district", $_district);
            $stmt->bindParam(":number", $_number);
            $stmt->bindParam(":description", $_description);
            $stmt->bindParam(":cep", $_cep);
            $stmt->bindParam(":id_city", $_id_city);
            $stmt->bindParam(":name", $_name);
            $stmt->bindParam(":destinatary", $_destinatary);
            $stmt->bindParam(":user_cpf", $_user_cpf);

            $_street = $address->getStreet();
            $_district = $address->getDistrict();
            $_number = $address->getNumber();
            $_description = $address->getDescription();
            $_cep = $address->getCep();
            $_id_city = $address->getCity()->getId();
            $_name = $address->getName();
            $_destinatary = $address->getDestinatary();
            $_user_cpf = $address->getOwner()->getCpf();

            $stmt->execute();

            $address->setId($con->lastInsertId());

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function insertNoOwner(Address $address){
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("INSERT INTO bd_pechincha.addresses(street, district, number, description, cep, id_city, name, destinatary) values(:street, :district, :number, :description, :cep, :id_city, :name, :destinatary)");
            $stmt->bindParam(":street", $_street);
            $stmt->bindParam(":district", $_district);
            $stmt->bindParam(":number", $_number);
            $stmt->bindParam(":description", $_description);
            $stmt->bindParam(":cep", $_cep);
            $stmt->bindParam(":id_city", $_id_city);
            $stmt->bindParam(":name", $_name);
            $stmt->bindParam(":destinatary", $_destinatary);

            $_street = $address->getStreet();
            $_district = $address->getDistrict();
            $_number = $address->getNumber();
            $_description = $address->getDescription();
            $_cep = $address->getCep();
            $_id_city = $address->getCity()->getId();
            $_name = $address->getName();
            $_destinatary = $address->getDestinatary();

            $stmt->execute();

            $address->setId($con->lastInsertId());

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

    
    public function selectById(Address $address, bool $only_active = true){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM addresses WHERE id = :id");
            $stmt->bindParam(":id",$_id);
            
            $_id = $address->getId();

            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if(!$only_active || $row['is_active'] == $only_active){
                    $address->setStreet($row['street']);
                    $address->setDistrict($row['district']);
                    $address->setNumber($row['number']);
                    $address->setDescription($row['description']);
                    $address->setCep($row['cep']);
                    $address->setName($row['name']);
                    $address->setDestinatary($row['destinatary']);
                    

                    $city = new City();
                    $city->setId($row['id_city']);
                    $city = $city->findByID();
                    $address->setCity($city);

                    $customer = new Customer();
                    $customer->setCpf($row['user_cpf']);
                    $customer->findByID($only_active);
                    $address->setOwner($customer);

                    return $address;
                }
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public function select(Address $generic_address, bool $only_active = true){
        
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM addresses WHERE street LIKE :street, district LIKE :district, number LIKE :number, description LIKE :description, cep LIKE :cep, id_city = :id_city, user_cpf = :user_cpf, name LIKE :name, destinatary LIKE :destinatary");
            $stmt->bindParam(":street", $_street);
            $stmt->bindParam(":district", $_district);
            $stmt->bindParam(":number", $_number);
            $stmt->bindParam(":description", $_description);
            $stmt->bindParam(":cep", $_cep);
            $stmt->bindParam(":id_city", $_id_city);
            $stmt->bindParam(":name", $_name);
            $stmt->bindParam(":destinatary", $_destinatary);
            $stmt->bindParam(":user_cpf", $_user_cpf);

            $_street = '%'. $generic_address->getStreet() .'%';
            $_district = '%'. $generic_address->getDistrict() .'%';
            $_number = '%'. $generic_address->getNumber() .'%';
            $_description = '%'. $generic_address->getDescription() .'%';
            $_cep = '%'. $generic_address->getCep() .'%';
            $_id_city = '%'. $generic_address->getCity()->getId() .'%';
            $_name = '%'. $generic_address->getName() .'%';
            $_destinatary = '%'. $generic_address->getDestinatary() .'%';
            $_user_cpf =  '%'.$generic_address->getOwner()->getCpf().'%';
            
            $stmt->execute();

            $addresses = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if(!$only_active || $row['is_active'] == $only_active){
                    $address = new Address();
                    $address->setId($row['id']);
                    $address->setStreet($row['street']);
                    $address->setDistrict($row['district']);
                    $address->setNumber($row['number']);
                    $address->setDescription($row['description']);
                    $address->setCep($row['cep']);
                    $address->setName($row['name']);
                    $address->setDestinatary($row['destinatary']);

                    $city = new City();
                    $city->setId($row['id_city']);
                    $city = $city->findByID();
                    $address->setCity($city);

                    $customer = new Customer();
                    $customer->setCpf($row['user_cpf']);
                    $customer->findByID($only_active);
                    $address->setOwner($customer);

                    array_push($addresses,$address);
                }
            }


            return $addresses;

        } catch(PDOException $err){
            return array();
        }
        
    }

    public function selectByCustomer(Customer $customer, bool $only_active = true){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM addresses WHERE user_cpf = :user_cpf");
            $stmt->bindParam(":user_cpf", $_user_cpf);
            
            $_user_cpf = $customer->getCpf();
            
            $stmt->execute();

            $addresses = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if(!$only_active || $row['is_active'] == $only_active){
                    $address = new Address();
                    $address->setId($row['id']);
                    $address->setStreet($row['street']);
                    $address->setDistrict($row['district']);
                    $address->setNumber($row['number']);
                    $address->setDescription($row['description']);
                    $address->setCep($row['cep']);
                    $address->setName($row['name']);
                    $address->setDestinatary($row['destinatary']);

                    $city = new City();
                    $city->setId($row['id_city']);
                    $city = $city->findByID();
                    $address->setCity($city);

                    $address->setOwner($customer);
                    array_push($addresses,$address);
                }
            }


            return $addresses;

        } catch(PDOException $err){
            return array();
        }
        
    }

    public function delete(Address $address)
    {
        try{

            $con = Connection::getConnection();
            $stmt = $con->prepare("UPDATE addresses SET is_active = 0 WHERE id=:id");
            $stmt->bindParam(":id",$_id);
            
            $_id = $address->getId();
            $stmt->execute();  
   
        }catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function update(Address $address)
    {
        try{
            $con = Connection::getConnection();

            $stmt = $con->prepare("UPDATE addresses SET street=:street, district=:district, number=:number, description=:description, cep=:cep, id_city=:id_city, name=:name, destinatary=:destinatary, user_cpf=:user_cpf WHERE id=:id");
            $stmt->bindParam(":street", $_street);
            $stmt->bindParam(":district", $_district);
            $stmt->bindParam(":number", $_number);
            $stmt->bindParam(":description", $_description);
            $stmt->bindParam(":cep", $_cep);
            $stmt->bindParam(":id_city", $_id_city);
            $stmt->bindParam(":name", $_name);
            $stmt->bindParam(":destinatary", $_destinatary);
            $stmt->bindParam(":id",$_id);
            $stmt->bindParam(":user_cpf", $_user_cpf);
            
            $_street = $address->getStreet();
            $_district = $address->getDistrict();
            $_number = $address->getNumber();
            $_description = $address->getDescription();
            $_cep = $address->getCep();
            $_id_city = $address->getCity()->getId();
            $_name = $address->getName();
            $_destinatary = $address->getDestinatary();
            $_id = $address->getId();
            $_user_cpf = $address->getOwner()->getCpf();

            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }


}