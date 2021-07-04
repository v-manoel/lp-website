<?php

require_once __DIR__."/Connection.php";
require_once __DIR__."/../negocio/Employee.php";


class EmployeeDao{

    public function insert(Employee $employee){
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("INSERT INTO users(name,cpf,email,pswd,phone,genre,birthday,department) values(:name, :cpf, :email, :pswd, :phone, :genre, :birthday,:department)");
            $stmt->bindParam(":name",$_name);
            $stmt->bindParam(":cpf",$_cpf);
            $stmt->bindParam(":email",$_email);
            $stmt->bindParam(":pswd",$_pswd);
            $stmt->bindParam(":phone",$_phone);
            $stmt->bindParam(":genre",$_genre);
            $stmt->bindParam(":birthday",$_birthday);
            $stmt->bindParam(":department",$_department);

            $_name = $employee->getName();
            $_cpf = $employee->getCpf();
            $_email = $employee->getEmail();
            $_pswd = $employee->getPswd();
            $_phone = $employee->getPhone();
            $_genre =$employee->getGenre() == "Masculino" ? 'M' : ("Feminino" ? 'F' : "");
            $_birthday = $employee->getBirthday();
            $_department = $employee->getDepartment();


            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function selectByCredentials(Employee $employee, bool $only_active = true){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM users WHERE email = :email and pswd = :pswd");
            $stmt->bindParam(":email",$_email);
            $stmt->bindParam(":pswd",$_pswd);
            
            $_email = $employee->getEmail();
            $_pswd = $employee->getPswd();

            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row['department'] != null){
                    $employee->setCpf($row['cpf']);
                    $employee->setName($row['name']);
                    $employee->setPhone($row['phone']);
                    $employee->setGenre($row['genre']);
                    $employee->setBirthday($row['birthday']);
                    $employee->setDepartment($row['department']);

                    return $employee;
                }
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public function selectById(Employee $employee, bool $only_active = true){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM users WHERE cpf = :cpf");
            $stmt->bindParam(":cpf",$_cpf);

            
            $_cpf = $employee->getCpf();

            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                if($row['department'] != null){
                    $employee->setEmail($row['email']);
                    $employee->setName($row['name']);
                    $employee->setPhone($row['phone']);
                    $employee->setGenre($row['genre']);
                    $employee->setBirthday($row['birthday']);
                    $employee->setDepartment($row['department']);

                    return $employee;
                }
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public function select(Employee $generic_employee, bool $only_active = true){
        
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM users WHERE name LIKE :name 
            AND cpf LIKE :cpf AND email LIKE :email AND phone LIKE :phone
            AND genre LIKE :genre AND birthday LIKE :birthday AND department LIKE :department");
            $stmt->bindParam(":name",$_name);
            $stmt->bindParam(":cpf",$_cpf);
            $stmt->bindParam(":email",$_email);
            $stmt->bindParam(":phone",$_phone);
            $stmt->bindParam(":genre",$_genre);
            $stmt->bindParam(":birthday",$_birthday);
            $stmt->bindParam(":department",$_department);
            
            $_phone = '%'.$generic_employee->getPhone().'%';
            $_genre =$generic_employee->getGenre() == "Masculino" ? 'M' : ("Feminino" ? 'F' : "");
            $_birthday = '%'.$generic_employee->getBirthday().'%';
            $_name = '%'. $generic_employee->getName() .'%';
            $_cpf = '%'. $generic_employee->getCpf() .'%';
            $_email = '%'. $generic_employee->getEmail() .'%';
            $_department =  '%'. $generic_employee->getDepartment() .'%';
            
            $stmt->execute();

            $employees = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['department'] != null){
                    $employee = new Employee();
                    $employee->setCpf($row['cpf']);
                    $employee->setEmail($row['email']);
                    $employee->setName($row['name']);
                    $employee->setPhone($row['phone']);
                    $employee->setGenre($row['genre']);
                    $employee->setBirthday($row['birthday']);
                    $employee->setDepartment($row['department']);
                
                    array_push($employees,$employee);
                }
            }

            return $employees;

        } catch(PDOException $err){
            return array();
        }
        
    }

    public function delete(Employee $employee)
    {
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("UPDATE users SET is_active = 0 WHERE cpf=:cpf");
            $stmt->bindParam(":cpf",$_cpf);
            
            $_cpf = $employee->getCpf();
            $stmt->execute();    

        }catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function update(Employee $employee)
    {
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("UPDATE users SET name=:name, email=:email, pswd=:pswd, phone=:phone, genre=:genre, birthday=:birthday, department=:department WHERE cpf=:cpf");
            $stmt->bindParam(":name",$_name);
            $stmt->bindParam(":cpf",$_cpf);
            $stmt->bindParam(":email",$_email);
            $stmt->bindParam(":pswd",$_pswd);
            $stmt->bindParam(":phone",$_phone);
            $stmt->bindParam(":genre",$_genre);
            $stmt->bindParam(":birthday",$_birthday);
            $stmt->bindParam(":department",$_department);

            $_name = $employee->getName();
            $_cpf = $employee->getCpf();
            $_email = $employee->getEmail();
            $_pswd = $employee->getPswd();
            $_phone = $employee->getPhone();
            $_genre =$employee->getGenre() == "Masculino" ? 'M' : ("Feminino" ? 'F' : "");
            $_birthday = $employee->getBirthday();
            $_department = $employee->getDepartment();

            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }
}