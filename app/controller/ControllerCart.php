<?php

require_once __DIR__."/../model/negocio/Item.php";
require_once __DIR__."/../model/negocio/Product.php";
require_once __DIR__."/../model/negocio/Customer.php";
require_once __DIR__."/../model/negocio/Order.php";

class ControllerCart extends Render{
    private Order $cart;

    public function __construct(){
        $this->cart = new Order();
         if(isset($_SESSION['cart'])){
            $this->cart = unserialize($_SESSION['cart']);
        }
        if(isset($_SESSION['user_login'])){
            $this->cart->setOwner(unserialize($_SESSION['user_login']));
        }
        $this->content['cart'] = $this->cart;
        $this->setTitle("La Pechincha Brasil");
        $this->setDesc("Carrinho de itens selecionado");
        $this->setKeywords("cart, carrinho, itens, sacola");
        $this->setDir("cart");
    }

    public function __destruct()
    {
        //Save cart changes into session
        $_SESSION['cart'] = serialize($this->cart);
    }

    public function myCart()
    {
        $this->renderLayout();
    }

    public function newItem()
    {
        $item = $this->loadItem();
        $this->cart->addItem($item);
        
        if(isset($_POST['buy-now'])){
            header('Location:'.DIRPAGE.'cart/myCart', true,302);
        }
    }

    public function changeItem()
    {
        $item = $this->loadItem();
        $this->cart->changeItem($item);

        header('Location:'.DIRPAGE.'cart/myCart', true,302);

    }

    public function changeDestination()
    {
        if(isset($_POST['order-addr'])){
            $addr = new Address();
            $addr->setId($_POST['order-addr']);
            if($addr->findByID()){
                $this->cart->setDestination($addr);
            }
        }
        header('Location:'.DIRPAGE.'cart/myCart', true,302);
    }

    public function goToPayment()
    {
        if(isset($_SESSION['user_login']) && count($this->cart->getItems())){
            $this->cart->setOwner(unserialize($_SESSION['user_login']));
            header('Location:'.DIRPAGE.'payment/page/preview', true,302);
        }else if(!isset($_SESSION['user_login'])){
            $dest_page = DIRPAGE . 'login';
            $dimiss_page = DIRPAGE.'cart/myCart';
            $this->messagePage("Você deve estar logado para continuar ! <br> <br> 
            Clique no botão abaixo <br> para entrar ou cadastrar uma nova conta",$dest_page,true, $dimiss_page);
        }else{
            $dimiss_page = DIRPAGE.'cart/myCart';
            $dest_page = DIRPAGE . 'cart/myCart';
            $this->messagePage("Seu Carrinho ainda está vazio! <br> <br> 
            Clique no botão abaixo <br> para continuar navegando no site",$dest_page,true, $dimiss_page);
        }
    }

    public function finish()
    {

    }

    public function loadItem(){
        $item = null;
        if(isset($_POST['prod-id'])){
            $prod = new Product();
            $prod->setId($_POST['prod-id']);
            if($prod->findByID()){
                $item = new Item();
                $item->setProduct($prod);
                if(isset($_POST['item-qnty']))
                    $item->setQnty($_POST['item-qnty']);
            }
        }

        return $item;
    }

}