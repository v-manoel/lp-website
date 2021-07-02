<?php

require_once __DIR__."/Connection.php";
require_once __DIR__."/../negocio/Order.php";
require_once __DIR__."/../negocio/Customer.php";
require_once __DIR__."/../negocio/Address.php";
require_once __DIR__."/../negocio/CreditCard.php";
require_once __DIR__."/../negocio/OrderStatus.php";

class OrderDao{


    public function insert(Order $order){        
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("INSERT INTO bd_pechincha.orders(date, price, rate, card_number, user_cpf, address_id, rate_description) values(:date, :price, :rate, :card_number, :user_cpf, :address_id, :rate_description)");
            $stmt->bindParam(":date", $_date);
            $stmt->bindParam(":price", $_price);
            $stmt->bindParam(":rate", $_rate);
            $stmt->bindParam(":card_number", $_card_number);
            $stmt->bindParam(":user_cpf", $_user_cpf);
            $stmt->bindParam(":address_id", $_address_id);
            $stmt->bindParam(":rate_description", $_rate_description);

            $_date = $order->getDate();
            $_price = $order->calcTotal();
            $_rate = $order->getRate();
            $_card_number = $order->getPayment()->getNumber();
            $_user_cpf = $order->getOwner()->getCpf();
            $_address_id = $order->getDestination()->getId();
            $_rate_description = $order->getRate_description();

            $stmt->execute();

            $order->setId($con->lastInsertId());

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

    
    public function selectById(Order $order){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM orders WHERE id = :id");
            $stmt->bindParam(":id",$_id);
            
            $_id = $order->getId();

            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $only_active = false;
                $owner = new Customer();
                $owner->setCpf($row['user_cpf']);
                $owner->findByID($only_active);

                $card = new CreditCard();
                $card->setNumber($row['card_number']);
                $card->findByID($only_active);

                $addr = new Address();
                $addr->setId($row['address_id']);
                $addr->findByID($only_active);

                $status = OrderStatus::allByOrder($order);

                $items = Item::allByOrder($order);
                
                //set the most recent status
                $order->setStatus($status[0]);
                $order->setItems($items);
                $order->setDate($row['date']);
                $order->setPrice($row['price']);
                $order->setRate($row['rate']);
                $order->setRate_description($row['rate_description']);
                $order->setPayment($card);
                $order->setOwner($owner);
                $order->setDestination($addr);

                return $order;
                
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public function select(Order $generic_order){
        
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM orders WHERE date LIKE :date AND price >= :price AND rate >= :rate AND card_number LIKE :card_number AND user_cpf LIKE :user_cpf AND address_id LIKE :address_id AND rate_description LIKE :rate_description");
            $stmt->bindParam(":date", $_date);
            $stmt->bindParam(":price", $_price);
            $stmt->bindParam(":rate", $_rate);
            $stmt->bindParam(":card_number", $_card_number);
            $stmt->bindParam(":user_cpf", $_user_cpf);
            $stmt->bindParam(":address_id", $_address_id);
            $stmt->bindParam(":rate_description", $_rate_description);
            
            $_date = '%'. $generic_order->getDate() .'%';
            $_price = $generic_order->getPrice();
            $_rate = $generic_order->getRate();
            $_card_number = !$generic_order->getPayment() ? '%' : '%'. $generic_order->getPayment()->getNumber() .'%';
            $_user_cpf = !$generic_order->getOwner() ? '%' : '%'. $generic_order->getOwner()->getCpf() .'%';
            $_address_id = !$generic_order->getDestination() ? '%' : '%'. $generic_order->getDestination()->getId() .'%';
            $_rate_description = '%'. $generic_order->getRate_description() .'%';
            
            $stmt->execute();
            
            $orders = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $only_active = false;
                $order = new Order();
                $order->setId($row['id']);


                $owner = new Customer();
                $owner->setCpf($row['user_cpf']);
                $owner->findByID($only_active);

                $card = new CreditCard();
                $card->setNumber($row['card_number']);
                $card->findByID($only_active);

                $addr = new Address();
                $addr->setId($row['address_id']);
                $addr->findByID($only_active);

                $status = OrderStatus::allByOrder($order);

                $items = Item::allByOrder($order);

                
                //set the most recent status
                $order->setStatus($status[0]);
                $order->setItems($items);
                $order->setDate($row['date']);
                $order->setPrice($row['price']);
                $order->setRate($row['rate']);
                $order->setRate_description($row['rate_description']);
                $order->setPayment($card);
                $order->setOwner($owner);
                $order->setDestination($addr);

                array_push($orders,$order);
                
            }


            return $orders;

        } catch(PDOException $err){
            return array();
        }
        
    }

    public function selectByCustomer(Customer $customer){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM orders WHERE user_cpf = :user_cpf");
            $stmt->bindParam(":user_cpf", $_user_cpf);
            
            $_user_cpf = $customer->getCpf();
            
            $stmt->execute();

            $orders = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $only_active = false;
                $order = new Order();
                $order->setId($row['id']);

                $card = new CreditCard();
                $card->setNumber($row['card_number']);
                $card->findByID($only_active);

                $addr = new Address();
                $addr->setId($row['address_id']);
                $addr->findByID($only_active);

                $status = OrderStatus::allByOrder($order);

                $items = Item::allByOrder($order);
                
                //set the most recent status
                $order->setStatus($status[0]);
                $order->setItems($items);
                $order->setDate($row['date']);
                $order->setPrice($row['price']);
                $order->setRate($row['rate']);
                $order->setRate_description($row['rate_description']);
                $order->setPayment($card);
                $order->setOwner($customer);
                $order->setDestination($addr);

                array_push($orders,$order);
                
            }


            return $orders;
        } catch(PDOException $err){
            return array();
        }
        
    }

    public function selectByAddress(Address $address){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM orders WHERE address_id = :address_id");
            $stmt->bindParam(":address_id", $_address_id);
            
            $_address_id = $address->getId();
            
            $stmt->execute();

            $orders = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $only_active =false;
                $order = new Order();
                $order->setId($row['id']);

                $card = new CreditCard();
                $card->setNumber($row['card_number']);
                $card->findByID($only_active);

                $owner = new Customer();
                $owner->setCpf($row['user_cpf']);
                $owner->findByID($only_active);

                $status = OrderStatus::allByOrder($order);
                $items = Item::allByOrder($order);
                
                //set the most recent status
                $order->setStatus($status[0]);
                $order->setItems($items);
                $order->setDate($row['date']);
                $order->setPrice($row['price']);
                $order->setRate($row['rate']);
                $order->setRate_description($row['rate_description']);
                $order->setPayment($card);
                $order->setOwner($owner);
                $order->setDestination($address);

                array_push($orders,$order);
                
            }


            return $orders;
        } catch(PDOException $err){
            return array();
        }
        
    }

    public function selectByCard(CreditCard $card){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM orders WHERE card_number = :card_number");
            $stmt->bindParam(":card_number", $_card_number);
            
            $_card_number = $card->getNumber();
            
            $stmt->execute();

            $orders = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $only_active = false;
                $order = new Order();
                $order->setId($row['id']);

                $addr = new Address();
                $addr->setId($row['address_id']);
                $addr->findByID($only_active);

                $owner = new Customer();
                $owner->setCpf($row['user_cpf']);
                $owner->findByID($only_active);

                $status = OrderStatus::allByOrder($order);
                $items = Item::allByOrder($order);
                
                //set the most recent status
                $order->setStatus($status[0]);
                $order->setItems($items);
                $order->setDate($row['date']);
                $order->setPrice($row['price']);
                $order->setRate($row['rate']);
                $order->setRate_description($row['rate_description']);
                $order->setPayment($card);
                $order->setOwner($owner);
                $order->setDestination($addr);

                array_push($orders,$order);
                
            }


            return $orders;
        } catch(PDOException $err){
            return array();
        }
        
    }

    public function update(Order $order)
    {
        try{
            $con = Connection::getConnection();

            $stmt = $con->prepare("UPDATE orders SET rate=:rate, rate_description=:rate_description WHERE id=:id");
            $stmt->bindParam(":rate", $_rate);
            $stmt->bindParam(":id", $_id);
            $stmt->bindParam(":rate_description", $_rate_description);
            
            $_id = $order->getId();
            $_rate = $order->getRate();
            $_rate_description = $order->getRate_description();

            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

}