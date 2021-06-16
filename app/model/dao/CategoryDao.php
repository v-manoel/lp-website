<?php

require_once __DIR__."/Connection.php";
require_once __DIR__."/../negocio/Product.php";
require_once __DIR__."/../negocio/Category.php";

class CategoryDao{


    public function insert(Category $category){
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("INSERT INTO bd_pechincha.categories(name) values(:name)");
            $stmt->bindParam(":title", $_name);

            $_name = $category->getName();

            $stmt->execute();

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

    
    public function selectById(Category $category){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM categories WHERE id = :id");
            $stmt->bindParam(":id",$_id);
            
            $_id = $category->getId();

            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $category->setName($row['name']);

                return $category;
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public function selectByName(Category $category){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM categories WHERE name = :name");
            $stmt->bindParam(":name",$_name);
            
            $_name = $category->getName();

            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $category->setId($row['id']);

                return $category;
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public function select(Category $generic_category){
        
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM categories WHERE name LIKE :name ");
            $stmt->bindParam(":name",$_name);
            
            $_name = '%'. $generic_category->getName() .'%';
            
            $stmt->execute();

            $categories = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $category = new Category();
                $category->setId($row['id']);
                $category->setName($row['name']);

                array_push($categories,$category);
            }


            return $categories;

        } catch(PDOException $err){
            return array();
        }
        
    }

    public function delete($category)
    {
        try{
            $con = Connection::getConnection();
            
            //Delete all products relations
            $prod_stmt = $con->prepare("DELETE FROM products_has_category WHERE id_category = :id_category");
            $prod_stmt->bindParam(":id_category", $category->getId());
            $prod_stmt->execute();
                
            $stmt = $con->prepare("DELETE FROM categories WHERE id=:id");
            $stmt->bindParam(":id",$_id);

            $_id = $category->getId();

            $stmt->execute();    
        }catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function update($category)
    {
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("UPDATE categories SET name=:name WHERE id=:id)");
            $stmt->bindParam(":id",$_name);
            $stmt->bindParam(":name",$_id);

            $_name = $category->getId();
            $_id = $category->getId();

            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }


}