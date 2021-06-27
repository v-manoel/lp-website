<?php

require_once __DIR__."/../model/negocio/Product.php";
require_once __DIR__."/../model/negocio/Category.php";
require_once __DIR__."/../model/negocio/Customer.php";

class ControllerBusca extends Render{

    protected $products;
    private $search_tags;

    public function __construct(){
        $this->setTitle("La Pechincha Brasil");
        $this->setDesc("Descrição e caracteristicas do produto selecionado");
        $this->setKeywords("produto, caracteristicas, descrição");
        $this->setDir("busca");
    }

    private function search(){
        $product = new Product();

        if(isset($_GET['price'])){
            $product->setPrice($_GET['price']);
            $_SESSION['search_string'] = $_GET['price'];
        }
        if(isset($_GET['source'])){
            $product->setSource($_GET['source']);
            $_SESSION['search_string'] = $_GET['source'];
        }
        if(isset($_GET['name'])){
            $product->setTitle($_GET['name']);
            $_SESSION['search_string'] = $_GET['name'];
        }
        if(isset($_GET['category'])){
            $category = new Category();
            $category->setName($_GET['category']);
            $category->findByName();
            $product->addCategory($category);
            $_SESSION['search_string'] = $_GET['category'];
        }
        if(isset($_GET['search_string'])){
            $product->setTitle($_GET['search_string']);
            $product->setSource($_GET['search_string']);

            if(is_numeric($_GET['search_string'])){
                $product->setPrice($_GET['search_string'] + 0);
                $product->setOffer($_GET['search_string'] + 0);
            }

            $category = new Category();
            $category->setName($_GET['search_string']);
            if($category->findByName())
                $product->addCategory($category);
            
            $_SESSION['search_string'] = $_GET['search_string'];
        }

        return $product->allBySimilarity();
    }

    public function addMain()
    {
        $products = $this->products;
        $search_string = $_SESSION['search_string'];

 
        foreach ($products as $prod) {
            foreach ($prod->getCategories() as $cat) {
                if(isset($categories[$cat->getName()])){
                    $categories[$cat->getName()] += 1;
                }else{
                    $categories[$cat->getName()] = 1;
                }
            }

            if(isset($sources[$prod->getSource()])){
                $sources[$prod->getSource()] += 1;
            }else{
                $sources[$prod->getSource()] = 1;
            }
        }

        usort($this->products,"Product::cmpPrice");
        $min_price = $this->products[0]->offerPrice();
        $max_price = $this->products[count($this->products)-1]->offerPrice();

        if(file_exists(DIRREQ."app/view/{$this->getDir()}/Main.php")){
            require(DIRREQ."app/view/{$this->getDir()}/Main.php");
        }
    }

    public function result(){
        $this->products = $this->search();
        $_SESSION['products_search'] = serialize($this->products);

        //Render page again - with found products
        $this->renderLayout();
    }

    public function filter(){
       $this->products = unserialize($_SESSION['products_search']);

        switch ($_GET['orderby']) {
            case 'by_cheaper':
                usort($this->products,"Product::cmpPrice");
                break;
            case 'by_expensive':
                usort($this->products,"Product::cmpPrice");
                $this->products = array_reverse($this->products);
                break;
            case 'by_offer':
                usort($this->products,"Product::cmpOffer");
                break;

            }

            if(isset($_GET['filter_category'])){
                $cat = new Category;
                $cat->setName($_GET['filter_category']);
                $cat->findByName();
                $this->products = Product::reducebyCategory($this->products,$cat);
            }
            if(isset($_GET['filter_source'])){
                $this->products =Product::reducebySource($this->products, $_GET['filter_source']);
            }
            if(isset($_GET['filter_price'])){
                $this->products =Product::reducebyPriceLim($this->products, $_GET['filter_price']);  
            }

        //Render page again - with found products
        $this->renderLayout();
    }


}