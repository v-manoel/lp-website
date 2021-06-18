<?php 

Class CreditCard{
	private $number;
	private $holder;
	private $cvv;
	private $expiration;
	

	public function delete(){
		
	}
	
	public function finByID($number){

	}

	public function update(){

	}

	public function all(){
/* 		$dao = new CreditCardDao();
		$cards = $dao->select($this);

		return $cards; */
	}

	public function validadteCvv($cvv){
		
		if($this->finByID($this->number) && $this->getCvv() == $cvv){
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
}