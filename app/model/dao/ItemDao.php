<?php

require_once __DIR__."/Connection.php";
require_once __DIR__."/../negocio/Item.php";
require_once __DIR__."/../negocio/Product.php";
require_once __DIR__."/../negocio/Order.php";

class ItemDao{


    public function insert(Item $item){
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("INSERT INTO bd_pechincha.items(id_order, id_product, price, qnty, storaged_qnty) values(:id_order, :id_product, :price, :qnty, :storaged_qnty)");
            $stmt->bindParam(":id_order", $_id_order);
            $stmt->bindParam(":id_product", $_id_product);
            $stmt->bindParam(":price", $_price);
            $stmt->bindParam(":qnty", $_qnty);
            $stmt->bindParam(":storaged_qnty", $_storaged_qnty);

            $_id_order = $item->getOrder()->getId();
            $_id_product = $item->getProduct()->getId();
            $_price = $item->getPrice();
            $_qnty = $item->getQnty();
            $_storaged_qnty = $item->getStoraged_qnty();

            $stmt->execute();

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

    
    public function selectById(Item $item){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM items WHERE id_order = :id_order AND id_product = :id_product");
            $stmt->bindParam(":id_order", $_id_order);
            $stmt->bindParam(":id_product",$_id_product);
            
            $_id_order = $item->getOrder()->getId();
            $_id_product = $item->getProduct()->getId();

            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    $prod = new Product();
                    $prod->setId($row['id_product']);
                    if($prod->findByID()){
                        $item->setProduct($prod);
                        $order = new Order();
                        $order->setId($row['id_order']);

                        $item->setOrder($order);
                        $item->setQnty($row['qnty']);
                        $item->setPrice($row['price']);
                        $item->setStoraged_qnty($row['storaged_qnty']);
                        return $item;
                    }  
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public function selectByProduct(Product $prod){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM items WHERE id_product = :id_product");
            $stmt->bindParam(":id_product", $_id_product);

            $_id_product = $prod->getId();
            
            $stmt->execute();

            $items = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $item = new Item();
                $item->setProduct($prod);
                $item->setQnty($row['qnty']);
                $item->setPrice($row['price']);
                $order = new Order();
                $order->setId($row['id_order']);
                        
                $item->setOrder($order);
                $item->setStoraged_qnty($row['storaged_qnty']);

                array_push($items,$item);
                  
            }

            return $items;

        } catch(PDOException $err){
            return array();
        }
    }

    public function selectByOrder(Order $order){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM items WHERE id_order = :id_order");
            $stmt->bindParam(":id_order", $_id_order);

            $_id_order = $order->getId();
            
            $stmt->execute();

            $items = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $prod = new Product();
                $prod->setId($row['id_product']);
                if($prod->findByID()){
                    $item = new Item();
                    $item->setProduct($prod);
                    $item->setOrder($order);
                    $item->setQnty($row['qnty']);
                    $item->setPrice($row['price']);
                    $item->setStoraged_qnty($row['storaged_qnty']);
                    array_push($items,$item);
                }  
            }

            return $items;

        } catch(PDOException $err){
            return array();
        }
    }

    public function select(Item $generic_item){
        
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM items WHERE price >= :price AND qnty >= :qnty");
            $stmt->bindParam(":price", $_price);
            $stmt->bindParam(":qnty", $_qnty);

            $_price = $generic_item->getPrice();
            $_qnty = $generic_item->getQnty();
            
            $stmt->execute();

            $items = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $prod = new Product();
                $prod->setId($row['id_product']);
                if($prod->findByID()){
                    $item = new Item();
                    $item->setProduct($prod);
                    $order = new Order();
                    $order->setId($row['id_order']);
                            
                    $item->setOrder($order);
                    $item->setQnty($row['qnty']);
                    $item->setPrice($row['price']);
                    $item->setStoraged_qnty($row['storaged_qnty']);
                    array_push($items,$item);
                }  
            }

            return $items;

        } catch(PDOException $err){
            return array();
        }
        
    }

    public function update(Item $item)
    {
        try{
            $con = Connection::getConnection();

            $stmt = $con->prepare("UPDATE items SET storaged_qnty=:storaged_qnty WHERE id_order = :id_order AND id_product = :id_product");
            $stmt->bindParam(":id_order", $_id_order);
            $stmt->bindParam(":id_product",$_id_product);
            $stmt->bindParam(":storaged_qnty", $_storaged_qnty);
            
            $_id_order = !$item->getOrder()? '%' : $item->getOrder()->getId();
            $_id_product = !$item->getProduct()? '%' : $item->getProduct()->getId();
            $_storaged_qnty = $item->getStoraged_qnty();


            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }


}