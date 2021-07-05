<?php

require_once __DIR__."/../model/negocio/Item.php";
require_once __DIR__."/../model/negocio/Product.php";
require_once __DIR__."/../model/negocio/Customer.php";
require_once __DIR__."/../model/negocio/Order.php";
require_once __DIR__."/../model/negocio/CreditCard.php";

class ControllerPayment extends Render{
    private ?Order $order;
    private $requested_page;

    public function __construct(){
        if(isset($_SESSION['cart']) && isset($_SESSION['user_login'])){
            $this->setTitle("La Pechincha Brasil");
            $this->setDesc("Carrinho de itens selecionado");
            $this->setKeywords("cart, carrinho, itens, sacola");
            $this->setDir("payment");
            
            $this->order = unserialize($_SESSION['cart']);
            $this->content['order'] = $this->order;
        }else{
            header('Location:'.DIRPAGE.'cart/myCart', true,302);
        }
    }

    public function __destruct()
    {
        //Save cart changes into session or delete it if order has been finished (null)
        if($this->order)
            $_SESSION['cart'] = serialize($this->order);
        else{
            $_SESSION['cart'] = null;
            session_unset($_SESSION['cart']);
        }
    }

    public function page($page){
        $this->content['order'] = $this->order;
        switch ($page) {
            case 'preview':
                $this->requested_page = "Preview";
                break;
            case 'confirm':
                $this->requested_page = "Confirm";
                break;
            case 'review':
                $this->requested_page = "Review";
                break;
            default:
                header('Location:'.DIRPAGE.'cart/myCart', true,302);
                break;
        }

        $this->renderLayout();
    }

    public function PaymentMethod(){
        if(isset($_POST['card-number'])){
            if(ucfirst($_POST['card-number']) == "Keep")
            {
                header('Location:'.DIRPAGE.'payment/page/review', true,302);
            }else{
                if(ucfirst($_POST['card-number']) != "New"){
                    $card = new CreditCard();
                    $card->setNumber($_POST['card-number']);
                    if($card->findByID()){
                        $this->order->setPayment($card);
                        $this->content['order'] = $this->order;
                    }
                }else{
                    $this->order->setPayment(null);
                }
                header('Location:'.DIRPAGE.'payment/page/confirm', true,302);
            }
        }else
        header('Location:'.DIRPAGE.'payment/page/preview', true,302);
    
    }

    public function ResetPayment()
    {
        $this->page("preview");
    }

    public function FinishOrder()
    {
        if($this->order->getDestination() && $this->order->getPayment()){
            if(!$this->order->getDestination()->getId()){
                if(!$this->order->getDestination()->insert()){
                    $dest_page = DIRPAGE.'payment/page/confirm';
                    $this->messagePage("Erro ao anexar novo endereço",$dest_page);
                }
            }
            if(!$this->order->getPayment()->findByID()){
                if(!$this->order->getPayment()->insert()){
                    $dest_page = DIRPAGE.'payment/page/confirm';
                    $this->messagePage("Erro ao anexar novo cartão",$dest_page);
                }

            }

            //Start point of our date range.
            $start = strtotime("1 July 2021 00:00:00");
            //End point of our date range.
            $end = strtotime("31 July 2021 00:00:00");
            //Custom range.
            $timestamp = mt_rand($start, $end);
            //Print it out.
            $this->order->setDate(date("Y-m-d H:i:s", $timestamp));


            if($this->order->insert()){
                $this->order = null;
                header('Location:'.DIRPAGE.'account/page/myOrders', true,302);
            }else{
                $dest_page = DIRPAGE.'home/';
                $this->messagePage("Erro ao encerrar pedido",$dest_page);
            }
        }
        
    }

    public function ChangeDestination()
    {
        if(isset($_POST['order-addr'])){
            $addr = new Address();
            $addr->setId($_POST['order-addr']);
            if($addr->findByID()){
                $this->order->setDestination($addr);
            }
        }else if(isset($_POST['new-address'])){
            $addr = new Address();
            if(isset($_POST['name'])){
                $addr->setName($_POST['name']);
            }
            if(isset($_POST['street'])){
                $addr->setStreet($_POST['street']);
            }
            if(isset($_POST['number'])){
                $addr->setNumber($_POST['number']);
            }
            if(isset($_POST['cep'])){
                $addr->setCep($_POST['cep']);
            }
            if(isset($_POST['city'])){
                $city = new City();
                $city->setId($_POST['city']);
                $city->findByID();
                $addr->setCity($city);
            }
            if(isset($_POST['district'])){
                $addr->setDistrict($_POST['district']);
            }
            if(isset($_POST['description'])){
                $addr->setDescription($_POST['description']);
            }
            if(isset($_POST['destinatary'])){
                $addr->setDestinatary($_POST['destinatary']);
            }
            //if($addr->insert()){
                $this->order->setDestination($addr);
            //}
        }
        header('Location:'.DIRPAGE.'payment/page/review', true,302);
    }

    public function PaymentValidation(){
        if(isset($_POST['card-cvv'])){
            if($this->order->getPayment()){
                if(!$this->order->getPayment()->validadteCvv($_POST['card-cvv'])){
                    $dest_page = DIRPAGE.'payment/page/confirm';
                    $this->messagePage("Código de Segurança Incorreto",$dest_page);
                }
            }else{
                $card = new CreditCard();
                $card->setCvv($_POST['card-cvv']);
                if(isset($_POST['card-number']))
                    $card->setNumber($_POST['card-number']);
                if(isset($_POST['card-holder']))
                    $card->setHolder($_POST['card-holder']);
                if(isset($_POST['card-expiration']))
                    $card->setExpiration($_POST['card-expiration']);
                    
                /*if(!($card->findByID())){
                    if($card->insert()){
                        $this->order->setPayment($card);
                    }
                    else{
                        $dest_page = DIRPAGE.'payment/page/confirm';
                        $this->messagePage("Erro ao anexar novo cartão",$dest_page);
                    }
                }else{
                    $this->order->setPayment($card);
                } */
                $card->findByID();
                $this->order->setPayment($card);
                    
            }
            header('Location:'.DIRPAGE.'payment/page/review', true,302);
        }else{
            header('Location:'.DIRPAGE.'payment/page/confirm', true,302);
        }
    }

    public function addMain()
    {
        if(file_exists(DIRREQ."app/view/{$this->getDir()}/{$this->requested_page}.php")){
            require(DIRREQ."app/view/{$this->getDir()}/{$this->requested_page}.php");
        }
        
    }


}