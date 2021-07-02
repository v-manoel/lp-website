<?php

require_once __DIR__."/Connection.php";
require_once __DIR__."/../negocio/OrderStatus.php";
require_once __DIR__."/../negocio/Order.php";
require_once __DIR__."/../negocio/Employee.php";

class OrderStatusDao{


    public function insert(OrderStatus $status){
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("INSERT INTO bd_pechincha.orderStatus(status, update_time, user_cpf, id_order) values(:status, :update_time, :user_cpf, :id_order)");
            $stmt->bindParam(":status", $_status);
            $stmt->bindParam(":update_time", $_update_time);
            $stmt->bindParam(":user_cpf", $_user_cpf);
            $stmt->bindParam(":id_order", $_id_order);

            $_status = $status->getStatus();
            $_update_time = $status->getUpdate_time();
            $_user_cpf = $status->getModifier() ? $status->getModifier()->getCpf() : null;
            $_id_order = $status->getOrder()->getId();

            $stmt->execute();

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function selectById(OrderStatus $status){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM orderStatus WHERE id = :id");
            $stmt->bindParam(":id", $_id);
            
            $_id = $status->getId();
            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $order = new Order();
                $order->setId($row['id_order']);

                $modifier = new Employee();
                $modifier->setCpf($row['user_cpf']);

                $status->setOrder($order);
                $status->setModifier($modifier);
                $status->setUpdate_time($row['update_time']);
                $status->setStatus($row['status']);
                
                return $status;
                    
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public function select(OrderStatus $generic_status){
        $_status = '%'. $generic_status->getStatus() .'%';
        $_update_time = $generic_status->getModifier() ? '%'. $generic_status->getModifier()->getCpf() .'%' : '%';
        $_update_time = '%'. $generic_status->getUpdate_time() .'%';
        $_id_order = $generic_status->getOrder() ? '%'. $generic_status->getOrder()->getId() .'%' : '%';

        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM orderStatus WHERE status LIKE :status AND update_time LIKE :update_time AND user_cpf LIKE :user_cpf AND id_order LIKE :id_order");
            $stmt->bindParam(":status",$_status);
            $stmt->bindParam(":update_time",$_update_time);
            $stmt->bindParam(":user_cpf",$_update_time);
            $stmt->bindParam(":id_order",$_id_order);
            
            $stmt->execute();

            $orders_status = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $status = new OrderStatus();

                $order = new Order();
                $order->setId($row['id_order']);

                $modifier = new Employee();
                $modifier->setCpf($row['user_cpf']);

                $status->setOrder($order);
                $status->setModifier($modifier);
                $status->setUpdate_time($row['update_time']);
                $status->setStatus($row['status']);
            
                array_push($orders_status,$status);
            }

            return $orders_status;

        } catch(PDOException $err){
            return array();
        }
        
    }

    public function selectByOrder(Order $order){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM orderStatus WHERE id_order = :id_order ORDER BY update_time DESC");
            $stmt->bindParam(":id_order", $_id_order);

            $_id_order = $order->getId();
            
            $stmt->execute();

            $orders_status = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $status = new OrderStatus();

                $modifier = new Employee();
                $modifier->setCpf($row['user_cpf']);

                $status->setOrder($order);
                $status->setModifier($modifier);
                $status->setUpdate_time($row['update_time']);
                $status->setStatus($row['status']);
            
                array_push($orders_status,$status);
            }

            return $orders_status;

        } catch(PDOException $err){
            return array();
        }
    }

    public function selectByEmployee(Employee $modifier){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM orderStatus WHERE user_cpf = :user_cpf");
            $stmt->bindParam(":user_cpf", $_user_cpf);

            $_user_cpf = $modifier->getCpf();
            
            $stmt->execute();

            $orders_status = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $status = new OrderStatus();

                $order = new Order();
                $order->setId($row['id_order']);

                $status->setOrder($order);
                $status->setModifier($modifier);
                $status->setUpdate_time($row['update_time']);
                $status->setStatus($row['status']);
            
                array_push($orders_status,$status);
            }

            return $orders_status;

        } catch(PDOException $err){
            return array();
        }
    }

    public function delete(OrderStatus $status)
    {
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("DELETE FROM orderStatus WHERE id=:id");
            $stmt->bindParam("id",$_id);

            $_id = $status->getId();

            $stmt->execute();    
        }catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function update(OrderStatus $status)
    {
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("UPDATE orderStatus SET status = :status, update_time = :update_time, user_cpf = :user_cpf, id_order = :id_order WHERE id = :id)");
            $stmt->bindParam(":status", $_status);
            $stmt->bindParam(":update_time", $_update_time);
            $stmt->bindParam(":user_cpf", $_user_cpf);
            $stmt->bindParam(":id_order", $_id_order);
            $stmt->bindParam(":id",$_id);

            $_id = $status->getId();
            $_status = $status->getStatus();
            $_update_time = $status->getUpdate_time();
            $_user_cpf = $status->getModifier() ? $status->getModifier()->getCpf() : null;
            $_id_order = $status->getOrder()->getId();

            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }
}