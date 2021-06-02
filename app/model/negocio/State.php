<?php 


Class State{
	private $id;
	private $uf;

	public function finByID($id){

	}
	
	public function all(State $generic_state = new State()){
		$dao = new StateDao();
		$states = $dao->select($generic_state);

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