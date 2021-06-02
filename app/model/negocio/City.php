<?php

Class City{

	private $id;
	private $name;

	public function finByID($id){

	}
	
	public function all(City $generic_city = new City()){
		$dao = new CityDAO();
		$cities = $dao->select($generic_city);

		return $cities;
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
}