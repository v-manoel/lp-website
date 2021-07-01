<?php

require_once __DIR__."/../dao/CityDao.php";
require_once __DIR__."/State.php";

Class City{

	private $id = null;
	private $name = "";
	private ?State $state = null;

		
	public function findByID(){
		$dao = new CityDAO();
		$city = $dao->selectById($this);

		return $city;
	}
	
	public function findByName(){
		$dao = new CityDAO();
		$city = $dao->selectByName($this);

		return $city;
	}

	public function all(){
		$dao = new CityDAO();
		$cities = $dao->select($this);

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

	static public function allByState(State $state){
		$dao = new CityDao();
		return $dao->selectByState($state);
	}
}