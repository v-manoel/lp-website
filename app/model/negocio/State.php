<?php 

require_once __DIR__."/../dao/StateDao.php";

Class State{
	private $id;
	private $uf = "";

	public function findByID(){
		$dao = new StateDAO();
		$state = $dao->selectById($this);

		return $state;
	}

	public function findByUf(){
		$dao = new StateDAO();
		$state = $dao->selectByUf($this);

		return $state;
	}

	public function all(){
		$dao = new StateDAO();
		$states = $dao->select($this);

		return $states;
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