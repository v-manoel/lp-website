<?php

require_once __DIR__."/Connection.php";
require_once __DIR__."/../negocio/Product.php";
require_once __DIR__."/../negocio/Category.php";

class ProductDao{


    public function insert(Product $product){
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("INSERT INTO products(title,description,price,offer,source) values(:title, :description, :price, :offer, :source)");
            $stmt->bindParam(":title",$_title);
            $stmt->bindParam(":description",$_description);
            $stmt->bindParam(":price",$_price);
            $stmt->bindParam(":offer",$_offer);
            $stmt->bindParam(":source",$_source);

            $_title = $product->getTitle();
            $_description = $product->getDescription();
            $_price = $product->getPrice();
            $_offer = $product->getOffer();
            $_source = $product->getSource();


            $stmt->execute();
            
            //insert all linked images
            $product_id = $con->lastInsertId();
            foreach ($product->getImgs() as $img){
                try{
                    $stmt = $con->prepare("INSERT INTO images(src,id_product) values(:src, :id_product");
                    $stmt->bindParam(":src",$img);
                    $stmt->bindParam(":id_product",$product_id);
                    $stmt->execute();
                }catch(PDOException $err){
                    return false;
                }
            }
            //insert all linked categories relations
            foreach ($product->getCategories() as $cat){
                try{
                    $stmt = $con->prepare("INSERT INTO products_has_category(id_category,id_product) values(:id_category, :id_product");
                    $stmt->bindParam(":id_category",$_cat_id);
                    $stmt->bindParam(":id_product",$product_id);
                    
                    $_cat_id = $cat->getId();
                    
                    $stmt->execute();
                }catch(PDOException $err){
                    return false;
                }
            }

        } catch(PDOException $err){
            return false;
        }
        return true;
    }

    
    public function selectById(Product $product, bool $only_active = true){
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM products WHERE id = :id");
            $stmt->bindParam(":id",$_id);

            $_id = $product->getId();
            
            $stmt->execute();

            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if(!$only_active || $row['is_active'] == $only_active){
                    $product->setTitle($row['title']);
                    $product->setDescription($row['description']);
                    $product->setPrice($row['price']);
                    $product->setOffer($row['offer']);
                    $product->setSource($row['source']);
                    
                    
                    //Set product images
                    $img_stmt = $con->prepare("SELECT * FROM images WHERE id_product = :product_id");
                    $img_stmt->bindParam(":product_id", $_id);
                    $img_stmt->execute();
                    while($img_row = $img_stmt->fetch(PDO::FETCH_ASSOC)){
                        $product->addImg($img_row['src']);
                    }

                    //Set product categories
                    $cat_stmt = $con->prepare("SELECT * FROM products_has_category WHERE id_product = :product_id");
                    $cat_stmt->bindParam(":product_id", $_id);
                    $cat_stmt->execute();
                    while($cat_row = $cat_stmt->fetch(PDO::FETCH_ASSOC)){
                        $category = new Category();
                        $category->setId($cat_row['id_category']);
                        $category = $category->findByID();
                        $product->addCategory($category);
                    }

                    return $product;
                }
            }
            
        } catch(PDOException $err){
            return null;
        }

        return null;
    }

    public function select(Product $generic_product, bool $only_active = true){
        
        try{
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM products WHERE title LIKE :title 
            AND description LIKE :description AND price >= :price AND offer >= :offer 
            AND source LIKE :source");
            $stmt->bindParam(":title",$_title);
            $stmt->bindParam(":description",$_description);
            $stmt->bindParam(":price",$_price);
            $stmt->bindParam(":offer",$_offer);
            $stmt->bindParam(":source",$_source);

            $_title = '%'. $generic_product->getTitle() .'%';
            $_description = '%'. $generic_product->getDescription() .'%';
            $_price = $generic_product->getPrice();
            $_offer = $generic_product->getOffer();
            $_source = '%'. $generic_product->getSource() .'%';

            $stmt->execute();
            $products = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if(!$only_active || $row['is_active'] == $only_active){
                    $product = new Product();
                    $product->setId($row['id']);
                    $product->setTitle($row['title']);
                    $product->setDescription($row['description']);
                    $product->setPrice($row['price']);
                    $product->setOffer($row['offer']);
                    $product->setSource($row['source']);
                    

                    $_id = $product->getId();
                    
                    $img_stmt = $con->prepare("SELECT * FROM bd_pechincha.images WHERE id_product = :product_id");
                    $img_stmt->bindParam(":product_id", $_id);
                    $img_stmt->execute();
                    while($img_row = $img_stmt->fetch(PDO::FETCH_ASSOC)){
                        $product->addImg($img_row['src']);
                    }

                    //Set product categories
                    $cat_stmt = $con->prepare("SELECT * FROM bd_pechincha.products_has_category WHERE id_product = :product_id");
                    $cat_stmt->bindParam(":product_id", $_id);
                    $cat_stmt->execute();
                    while($cat_row = $cat_stmt->fetch(PDO::FETCH_ASSOC)){
                        $category = new Category();
                        $category->setId($cat_row['id_category']);
                        $category = $category->findByID();
                        $product->addCategory($category);
                    }

                    array_push($products,$product);
                }
            }


            return $products;

        } catch(PDOException $err){
            return array();
        }
        
    }

    public function allByCategory(Category $category)
    {
        try {
            $_id = $category->getId();
           
            $con = Connection::getConnection();
            $stmt = $con->prepare("SELECT * FROM products_has_category WHERE id_category = :id_category");
            $stmt->bindParam(":id_category", $_id);
            $stmt->execute();

      
            $products = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $product = new Product();
                $product->setId($row['id_product']);
                $product = $product->findByID();
                
                if($product){
                    array_push($products,$product);
                }
                
            }

            return $products;
        } catch (PDOException $err) {
            return null;
        }
    }

    public function delete($product)
    {
        //Should just check a flag ?
        try{
            $con = Connection::getConnection();

            $stmt = $con->prepare("UPDATE products SET is_active = 0 WHERE id=:id");
            $stmt->bindParam(":id",$_id);
            
            $_id = $product->getId();

            $stmt->execute();    
        }catch(PDOException $err){
            return false;
        }
        return true;
    }

    public function update(Product $product)
    {
        try{
            $con = Connection::getConnection();
            
            $stmt = $con->prepare("UPDATE products SET title=:title, description=:description, price=:price, offer=:offer, source=:source WHERE id=:id");
            $stmt->bindParam(":id",$_id);
            $stmt->bindParam(":title",$_title);
            $stmt->bindParam(":description",$_description);
            $stmt->bindParam(":price",$_price);
            $stmt->bindParam(":offer",$_offer);
            $stmt->bindParam(":source",$_source);
            

            $_id = $product->getId();
            $_title = $product->getTitle();
            $_description = $product->getDescription();
            $_price = $product->getPrice();
            $_offer = $product->getOffer();
            $_source = $product->getSource();
            
            $stmt->execute();            

        } catch(PDOException $err){
            return false;
        }
        return true;
    }
}