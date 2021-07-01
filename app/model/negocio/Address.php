<?php 

require_once __DIR__."/../dao/AddressDao.php";
require_once __DIR__."/City.php";
require_once __DIR__."/Customer.php";
require_once __DIR__."/State.php";

Class Address{
	private $id = null;
	private ?State $state = null;
	private ?City $city = null;
	private $district = "";
	private $street = "";
	private $number = "";
	private $description = "";
	private $name = "";
	private $destinatary = "";
	private $cep = "";
	private ?Customer $owner = null;

	
	public function insert(){
		$dao = new AddressDao();
		return $dao->insert($this);
	}

	public function update(){
		$dao = new AddressDao();
		return $dao->update($this);
	}

	public function all($only_active = true){
 		$dao = new AddressDao();
		$addresses = $dao->select($this, $only_active);

		return $addresses; 
	}

	public function findByID($only_active = true){
		$dao = new AddressDao();
		$res = $dao->selectById($this, $only_active);
		return $res;
	}
	

	public function delete(){
		$dao = new AddressDao();
		return $dao->delete($this);
	}
	

	/**
	 * Get the value of description
	 */ 
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Set the value of description
	 *
	 * @return  self
	 */ 
	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
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
	 * Get the value of street
	 */ 
	public function getStreet()
	{
		return $this->street;
	}

	/**
	 * Set the value of street
	 *
	 * @return  self
	 */ 
	public function setStreet($street)
	{
		$this->street = $street;

		return $this;
	}

	/**
	 * Get the value of district
	 */ 
	public function getDistrict()
	{
		return $this->district;
	}

	/**
	 * Set the value of district
	 *
	 * @return  self
	 */ 
	public function setDistrict($district)
	{
		$this->district = $district;

		return $this;
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
	 * Get the value of city
	 */ 
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * Set the value of city
	 *
	 * @return  self
	 */ 
	public function setCity($city)
	{
		$this->city = $city;

		//also fill state attribute
		$this->state = $this->city->getState();

		return $this;
	}

	/**
	 * Get the value of state
	 */ 
	public function getState()
	{
		return $this->state;
	}

	/**
	 * Set the value of state
	 *
	 * @return  self
	 */ 
	public function setState($state)
	{
		$this->state = $state;

		return $this;
	}

	/**
	 * Get the value of name
	 */ 
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 *
	 * @return  self
	 */ 
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get the value of destinatary
	 */ 
	public function getDestinatary()
	{
		return $this->destinatary;
	}

	/**
	 * Set the value of destinatary
	 *
	 * @return  self
	 */ 
	public function setDestinatary($destinatary)
	{
		$this->destinatary = $destinatary;

		return $this;
	}

	/**
	 * Get the value of cep
	 */ 
	public function getCep()
	{
		return $this->cep;
	}

	/**
	 * Set the value of cep
	 *
	 * @return  self
	 */ 
	public function setCep($cep)
	{
		$this->cep = $cep;

		return $this;
	}

	public static function allByCustomer(Customer $customer, $only_active = true){
		$dao = new AddressDao();
		return $dao->selectByCustomer($customer, $only_active);
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
}