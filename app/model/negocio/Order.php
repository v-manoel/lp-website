<?php

require_once __DIR__."/CreditCard.php";
require_once __DIR__."/Address.php";
require_once __DIR__."/Customer.php";
require_once __DIR__."/OrderStatus.php";
require_once __DIR__."/Item.php";

Class Order{
	private $id;
	private $items = array();
	private $date = "";
	private $price = 0.0;
	private Address $destination;
	private CreditCard $payment;
	private Customer $owner;
	private $rate = 0.0;
	private OrderStatus $status;

	public function delete(){

	}
	
	public function findByID($id){

	}

	public function update(){

	}

	public function all(){
/* 		$dao = new OrderDao();
		$orders = $dao->select($this);

		return $orders; */
	}

	public function insert(){
		
	}

	public function addItem($item){
		array_push($this->items,$item);
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
	
	public function evaluate($rate)
	{
		if($this->status->getStatus() == "delivered"){
			$this->rate = $rate;
			$this->update();
			return true;
		}
		return false;
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
}