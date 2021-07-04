
<?php

require_once __DIR__."/../dao/CustomerDao.php";
require_once __DIR__."/User.php";

Class Customer extends User{
	//stats attributes
	private $total_sales = 0.0;
	private $total_orders = 0;

	public function findByID($only_active = true){
		$dao = new CustomerDao();
		$res = $dao->selectById($this,$only_active);
		return $res;
	}

	public function all($only_active = true){
		$dao = new CustomerDao();
		$customers = $dao->select($this,$only_active);
		return $customers;
	}

	public function update(){
		$dao = new CustomerDao();
		return $dao->update($this);
	}

	public function insert(){
		$dao = new CustomerDao();
		return $dao->insert($this);
	}


	public function delete(){
		$dao = new CustomerDao();
		return $dao->delete($this);
	}

	//Verifica se os usuário esta cadastrado no banco de dados
	public function checkCredentials(){
		$dao = new CustomerDao();
		if($res = $dao->selectByCredentials($this)){
			return true;
		}
		return false;
	}


	/**
	 * Get the value of total_sales
	 */ 
	public function getTotal_sales()
	{
		return $this->total_sales;
	}

	/**
	 * Set the value of total_sales
	 *
	 * @return  self
	 */ 
	public function setTotal_sales($total_sales)
	{
		$this->total_sales = $total_sales;

		return $this;
	}

	/**
	 * Get the value of total_orders
	 */ 
	public function getTotal_orders()
	{
		return $this->total_orders;
	}

	/**
	 * Set the value of total_orders
	 *
	 * @return  self
	 */ 
	public function setTotal_orders($total_orders)
	{
		$this->total_orders = $total_orders;

		return $this;
	}
}