<?php 

require './City.php';
require './State.php';

Class Address{
	private $id;
	private State $uf;
	private City $city;
	private $district;
	private $street;
	private $number;
	private $description;

	
	public function insert(){
	
	}

	public function update(){

	}

	public function all(Address $generic_address = new Address()){
		$dao = new AddressDao();
		$addresses = $dao->select($generic_address);

		return $addresses;
	}

	public function finByID($id){

	}
	

	public function delete(){

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

		return $this;
	}

	/**
	 * Get the value of uf
	 */ 
	public function getUf()
	{
		return $this->uf;
	}

	/**
	 * Set the value of uf
	 *
	 * @return  self
	 */ 
	public function setUf($uf)
	{
		$this->uf = $uf;

		return $this;
	}
}