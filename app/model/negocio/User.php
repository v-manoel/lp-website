<?php

abstract Class User{
	protected $name = "";
	protected $cpf = "";
	protected $pswd = "";
	protected $email = "";
	protected $phone = "";
	protected $birthday = null;
	protected $genre = "";

	public function findByID($only_active = true){

	}
	public function all($only_active = true){

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

	public  function NamePieces($delimiter = " ",$qnty_names = 2){
		return explode($delimiter, $this->name, $qnty_names);
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
		$this->name = ucwords($name);

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

	/**
	 * Get the value of phone
	 */ 
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * Set the value of phone
	 *
	 * @return  self
	 */ 
	public function setPhone($phone)
	{
		$this->phone = $phone;

		return $this;
	}

	/**
	 * Get the value of birthday
	 */ 
	public function getBirthday()
	{
		return $this->birthday;
	}

	/**
	 * Set the value of birthday
	 *
	 * @return  self
	 */ 
	public function setBirthday($birthday)
	{
		if($birthday)
			$this->birthday = $birthday;
		else
			$this->birthday = Null;

		return $this;
	}

	/**
	 * Get the value of gender
	 */ 
	public function getGenre()
	{
		return $this->genre;
	}

	/**
	 * Set the value of gender
	 *
	 * @return  self
	 */ 
	public function setGenre($genre)
	{
		if(strtoupper($genre) == 'F')
			$this->genre = "Feminino";
		else if(strtoupper($genre) == 'M')
			$this->genre = "Masculino";

		return $this;
	}
}