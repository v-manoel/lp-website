<?php

abstract Class User{
	protected $name = "";
	protected $cpf = "";
	protected $pswd = "";
	protected $email = "";

	public function finByID($integer){

	}
	public function all(){

	}
	
	public function uspdate(){
		
	}

	public function insert(){
		

	}

	public function delete(){
		
	}
	
	//Verifica se os usuário fornecido esta cadastrado no banco de dados
	public function checkCredentials(){
		
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
	 * Get the value of cpf
	 */ 
	public function getCpf()
	{
		return $this->cpf;
	}

	/**
	 * Set the value of cpf
	 *
	 * @return  self
	 */ 
	public function setCpf($cpf)
	{
		$this->cpf = $cpf;

		return $this;
	}

	/**
	 * Get the value of pswd
	 */ 
	public function getPswd()
	{
		return $this->pswd;
	}

	/**
	 * Set the value of pswd
	 *
	 * @return  self
	 */ 
	public function setPswd($pswd)
	{
		$this->pswd = $pswd;

		return $this;
	}

	/**
	 * Get the value of email
	 */ 
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set the value of email
	 *
	 * @return  self
	 */ 
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}
}