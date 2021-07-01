<?php

require_once __DIR__."/CreditCard.php";
require_once __DIR__."/Address.php";
require_once __DIR__."/Customer.php";
require_once __DIR__."/OrderStatus.php";
require_once __DIR__."/Item.php";
require_once __DIR__."/../dao/OrderDao.php"; 

Class Order{
	private $id = null;
	private $items = array();
	private $date = "";
	private $price = 0.0;
	private ?Address $destination = null;
	private ?CreditCard $payment = null;
	private ?Customer $owner = null;
	private $rate = 0.0;
	private ?OrderStatus $status = null;
	private $rate_description = "";

	public function insert(){
		$dao = new OrderDao();
		if($dao->insert($this)){
			//if this order has been inserted, then insert its items and status
			foreach ($this->items as $item) {
				$item->setOrder($this);
				$item->insert();
			}

			//Sets and inserts initial order status
			$this->status = new OrderStatus();
			$this->status->setOrder($this);
			$this->status->setStatus("Paid");
			$this->status->setUpdate_time($this->date);
			$this->status->insert();
			
			return true;


		}else{
			return false;
		}
	}


	public function all(){
 		$dao = new OrderDao();
		$orders = $dao->select($this);

		return $orders; 
	}

	public function findByID(){
		$dao = new OrderDao();
		$res = $dao->selectById($this);
		return $res;
	}

	public function update(){
		$dao = new OrderDao();
		return $dao->update($this);
	}
	
	public function addItem($item){
		foreach ($this->items as $it) {
			if($it->getProduct()->getId() == $item->getProduct()->getId()){
				$it->setQnty($it->getQnty() + $item->getQnty());
				return;
			}
		}
		array_push($this->items,$item);
	}

	public function changeItem($item)
	{
		foreach ($this->items as $index => $it) {
			if($it->getProduct()->getId() == $item->getProduct()->getId()){
				//Delete this item if its qnty is zero
				if(!$item->getQnty())
					array_splice($this->items,$index,1);
				//Update this item qnty
				else
					$it->setQnty($item->getQnty());
			}
		}

	}

	public function close($date){
		
		if($this->card != null){
			$this->date = $date;

			//set status as preparing
			$this->status = new OrderStatus;
			$this->status->setOrder($this);
			$this->status->setUpdate_time($date);
			$this->status->setStatus("preparing");
			$this->status->insert();

			//register this new order
			$this->insert();

			return true;
		}
		return false;
	}

	public function pay($card){
		$this->setPayment($card);
	}

	public function statusHistory(){
		return $this->status->all();
	}
	
	public function evaluate($rate, $rate_description)
	{
		if($this->status->getStatus() == "delivered"){
			$this->rate = $rate;
			$this->rate = $rate_description;
			$this->update();
			return true;
		}
		return false;
	}

	public function calcTotal()
	{
		$this->price = 0.0;
		foreach ($this->items as $item) {
			$this->price += $item->getPrice();
		}

		return $this->price;
	}

	public function getProdQnty()
	{
		$prod_qnty = 0;
		foreach ($this->items as $item) {
			$prod_qnty += $item->getQnty();
		}
		return $prod_qnty;
	}

	public function allStatus(){
		return OrderStatus::allByOrder($this);
	}

	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of items
	 */ 
	public function getItems()
	{
		return $this->items;
	}

	/**
	 * Set the value of items
	 *
	 * @return  self
	 */ 
	public function setItems($items)
	{
		$this->items = $items;

		return $this;
	}

	/**
	 * Get the value of date
	 */ 
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * Set the value of date
	 *
	 * @return  self
	 */ 
	public function setDate($date)
	{
		$this->date = $date;

		return $this;
	}

	/**
	 * Get the value of price
	 */ 
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Set the value of price
	 *
	 * @return  self
	 */ 
	public function setPrice($price)
	{
		$this->price = $price;

		return $this;
	}

	/**
	 * Get the value of destination
	 */ 
	public function getDestination()
	{
		return $this->destination;
	}

	/**
	 * Set the value of destination
	 *
	 * @return  self
	 */ 
	public function setDestination($destination)
	{
		$this->destination = $destination;

		return $this;
	}

	/**
	 * Get the value of payment
	 */ 
	public function getPayment()
	{
		return $this->payment;
	}

	/**
	 * Set the value of payment
	 *
	 * @return  self
	 */ 
	public function setPayment($payment)
	{
		$this->payment = $payment;

		return $this;
	}

	/**
	 * Get the value of owner
	 */ 
	public function getOwner()
	{
		return $this->owner;
	}

	/**
	 * Set the value of owner
	 *
	 * @return  self
	 */ 
	public function setOwner($owner)
	{
		$this->owner = $owner;

		return $this;
	}

	/**
	 * Get the value of rate
	 */ 
	public function getRate()
	{
		return $this->rate;
	}

	/**
	 * Set the value of rate
	 *
	 * @return  self
	 */ 
	public function setRate($rate)
	{
		$this->rate = $rate;

		return $this;
	}

	/**
	 * Get the value of status
	 */ 
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Set the value of status
	 *
	 * @return  self
	 */ 
	public function setStatus($status)
	{
		$this->status = $status;

		return $this;
	}

		/**
	 * Get the value of rate_description
	 */ 
	public function getRate_description()
	{
		return $this->rate_description;
	}

	/**
	 * Set the value of rate_description
	 *
	 * @return  self
	 */ 
	public function setRate_description($rate_description)
	{
		$this->rate_description = $rate_description;

		return $this;
	}

	public static function allByCustomer(Customer $customer){
		$dao = new OrderDao();
		return $dao->selectByCustomer($customer);
	}

	public static function allByCard(CreditCard $card){
		$dao = new OrderDao();
		return $dao->selectByCard($card);
	}

	public static function allByAddress(Address $address){
		$dao = new OrderDao();
		return $dao->selectByAddress($address);
	}


}