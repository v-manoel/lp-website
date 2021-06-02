<?php

require './Customer.php';
require './Address.php';
require './CreditCard.php';
require './Order.php';

Class CustomerAccount{
	private $customer;
	private $my_cards;
	private $my_orders;
	private $my_address;

	public function __construct(Customer $customer)
	{
		$this->customer = $customer;
		//$this->my_address = CustomerAddressDAO loads all customer address
		//$this->my_cards = CustomerCardsDAO loads all customer address
		//$this->my_orders = CustomerOrderDAO loads all customer address

	}

	public function addAddress(Address $Adress){
		array_push($this->my_address, $Adress);
		//CustomerAddressDAO inserts this new address
	}

	public function addCredcard(CreditCard $Credcard){
		array_push($this->my_cards, $Credcard);
		//CustomerCardDAO inserts this new card
	}

	public function deleteAddress(Address $Address){
		//CustomerAddressDAO deletes this address
		//$my_address = //CustomerAddressDAO selects all address again
	}

	public function deleteCredcard(CreditCard $Credcard){
		//CustomerCardDAO deletes this address
		//$my_Cards = //CustomerCardDAO selects all cards again
	}

	public function changeAddress(Address $Address){
		foreach ($this->my_address as $address){
			if($address->getId() == $Address->getId()){
				$address = $Address;
				//CustomerAddressDAO updates this address
				return true;
			}
		}
		return false;
	}

	public function changeCredcard(CreditCard $Credcard){
		foreach ($this->my_cards as $cards){
			if($cards->getNumber() == $Credcard->getNumber()){
				$address = $Credcard;
				//CustomerAddressDAO updates this address
				return true;
			}
		}
		return false;
	}


	public function copyOrder($id_order){
		foreach ($this->my_orders as $order) {
			if($order->getId() == $id_order)
				return $order; //$_SESSION['Cart'] = $order
		}
	}



	/**
	 * Get the value of customer
	 */ 
	public function getCustomer()
	{
		return $this->customer;
	}

	/**
	 * Set the value of customer
	 *
	 * @return  self
	 */ 
	public function setCustomer($customer)
	{
		$this->customer = $customer;

		return $this;
	}

	/**
	 * Get the value of my_cards
	 */ 
	public function getMy_cards()
	{
		return $this->my_cards;
	}

	/**
	 * Set the value of my_cards
	 *
	 * @return  self
	 */ 
	public function setMy_cards($my_cards)
	{
		$this->my_cards = $my_cards;

		return $this;
	}

	/**
	 * Get the value of my_orders
	 */ 
	public function getMy_orders()
	{
		return $this->my_orders;
	}

	/**
	 * Set the value of my_orders
	 *
	 * @return  self
	 */ 
	public function setMy_orders($my_orders)
	{
		$this->my_orders = $my_orders;

		return $this;
	}

	/**
	 * Get the value of my_address
	 */ 
	public function getMy_address()
	{
		return $this->my_address;
	}

	/**
	 * Set the value of my_address
	 *
	 * @return  self
	 */ 
	public function setMy_address($my_address)
	{
		$this->my_address = $my_address;

		return $this;
	}
}