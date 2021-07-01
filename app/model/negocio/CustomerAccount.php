<?php

require_once __DIR__."/Customer.php";
require_once __DIR__."/Address.php";
require_once __DIR__."/CreditCard.php";
require_once __DIR__."/Order.php";
require_once __DIR__."/../dao/AccountDao.php";

Class CustomerAccount{
	private $customer;
	private $cards;
	private $orders;
	private $addresses;

	public function __construct(Customer $customer)
	{
		$this->customer = $customer;
		$this->addresses = Address::allByCustomer($this->getCustomer());
		$this->cards = CreditCard::allByCustomer($this->getCustomer());
		$this->orders =Order::allByCustomer($this->getCustomer());

	}

	public function addAddress(Address $address){
		array_push($this->addresses, $address);
		return $address->insert();
	}

	public function addCredcard(CreditCard $credcard){
		if($credcard->insert()){
			array_push($this->cards, $credcard);
			$dao = new AccountDao(); 			
			return $dao->insertUserCard($credcard, $this->customer);
		}
		return false;
	}

	public function deleteAddress(Address $address){
		foreach ($this->addresses as $index => $add) {
			if($add->getId() == $address->getId()){
				$add->delete();
				array_splice($this->addresses,$index,1);
			}
		}
	}

	public function deleteCredcard(CreditCard $credcard){
		foreach ($this->cards as $index => $card) {
			if($card->getNumber() == $credcard->getNumber()){
				if($card->delete()){
					array_splice($this->cards,$index,1);
					$dao = new AccountDao(); 			
					return $dao->deleteUserCard($credcard, $this->customer);
				}
			}
		}
		return false;
	}

	public function changeAddress(Address $address){
		
		foreach ($this->addresses as $add){
			if($add->getId() == $address->getId()){
				$add = $address;
				$add->update();
				return true;
			}
		}
		return false;
	}

	public function changeCredcard(CreditCard $credcard){
		foreach ($this->cards as $card){
			if($card->getNumber() == $credcard->getNumber()){
				$card = $credcard;
				$card->update();
				return true;
			}
		}
		return false;
	}


	public function copyOrder(Order $order){
		foreach ($this->orders as $ord) {
			if($ord->getId() == $order->getId())
				return $ord; //$_SESSION['Cart'] = $order
		}
		return null;
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
	 * Get the value of cards
	 */ 
	public function getCards()
	{
		return $this->cards;
	}

	/**
	 * Set the value of cards
	 *
	 * @return  self
	 */ 
	public function setCards($cards)
	{
		$this->cards = $cards;

		return $this;
	}

	/**
	 * Get the value of orders
	 */ 
	public function getOrders()
	{
		return $this->orders;
	}

	/**
	 * Set the value of orders
	 *
	 * @return  self
	 */ 
	public function setOrders($orders)
	{
		$this->orders = $orders;

		return $this;
	}

	/**
	 * Get the value of addresses
	 */ 
	public function getAddresses()
	{
		return $this->addresses;
	}

	/**
	 * Set the value of addresses
	 *
	 * @return  self
	 */ 
	public function setMy_address($addresses)
	{
		$this->addresses = $addresses;

		return $this;
	}
}