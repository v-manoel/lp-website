<?php 

 require_once __DIR__."/../dao/CreditCardDao.php"; 

Class CreditCard{
	private $number;
	private $holder = "";
	private $cvv = null;
	private $expiration = "";
	

	public function insert(){
		$dao = new CreditCardDao();
		return $dao->insert($this);
	}

	public function findByID($only_active = true){
	 	$dao = new CreditCardDao();
		$res = $dao->selectById($this, $only_active);
		return $res; 
	}

	public function update(){
	 	$dao = new CreditCardDao();
		return $dao->update($this); 
	}

	public function all($only_active = true){
 		$dao = new CreditCardDao();
		$addresses = $dao->select($this, $only_active);

		return $addresses;  
   }

   public function delete(){
		$dao = new CreditCardDao();
		return $dao->delete($this); 
   }

	public function validadteCvv($cvv){
		
		if($this->findByID() && $this->getCvv() == $cvv){
			return true;
		}
		return false;
	}
	

	/**
	 * Get the value of number
	 */ 
	public function getNumber()
	{
		return $this->number;
	}

	/**
	 * Set the value of number
	 *
	 * @return  self
	 */ 
	public function setNumber($number)
	{
		$this->number = $number;

		return $this;
	}

	/**
	 * Get the value of holder
	 */ 
	public function getHolder()
	{
		return $this->holder;
	}

	/**
	 * Set the value of holder
	 *
	 * @return  self
	 */ 
	public function setHolder($holder)
	{
		$this->holder = $holder;

		return $this;
	}

	/**
	 * Get the value of cvv
	 */ 
	public function getCvv()
	{
		return $this->cvv;
	}

	/**
	 * Set the value of cvv
	 *
	 * @return  self
	 */ 
	public function setCvv($cvv)
	{
		$this->cvv = $cvv;

		return $this;
	}

	/**
	 * Get the value of expiration
	 */ 
	public function getExpiration()
	{
		return $this->expiration;
	}

	/**
	 * Set the value of expiration
	 *
	 * @return  self
	 */ 
	public function setExpiration($expiration)
	{
		$this->expiration = $expiration;

		return $this;
	}

 	public static function allByCustomer(Customer $customer, $only_active = true){
		$dao = new CreditCardDao();
		return $dao->selectByCustomer($customer, $only_active);
	} 
}