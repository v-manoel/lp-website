<?php

require_once __DIR__."/../dao/EmployeeDao.php";

Class Employee extends User{
	private $department = "";
	//stats attributes
	private $attendances_time = 0.0;
	private $attendances_qnty = 0;


	public function WorksIn($department){
		return ($this->department == $department || $this->department == "Gerente" || $this->department == "Entrega");
	}

	//Verifica se os usuário esta cadastrado no banco de dados
	public function checkCredentials(){
		$dao = new EmployeeDao();
		if($res = $dao->selectByCredentials($this)){
			return true;
		}
		return false;
	}
	
	public function findByID($only_active = true){
		$dao = new EmployeeDao();
		$res = $dao->selectById($this,$only_active);
		return $res;
	}

	public function all($only_active = true){
		$dao = new EmployeeDao();
		$customers = $dao->select($this,$only_active);
		return $customers;
	}

	public function update(){
		$dao = new EmployeeDao();
		return $dao->update($this);
	}

	public function insert(){
		$dao = new EmployeeDao();
		return $dao->insert($this);
	}


	public function delete(){
		$dao = new EmployeeDao();
		return $dao->delete($this);
	}

	public function isInMyDepartment(Order $order) : bool
	{
		if(ucfirst($this->department) == "Gerente" || ucfirst($this->department) == "Entrega")
			return true;
		if(ucfirst($order->getStatus()->onGoingStatus()) == "Preparing" && 
			ucfirst($this->department) == "Preparacao")
			return true;
		if(ucfirst($order->getStatus()->onGoingStatus()) == "Checking" && 
			ucfirst($this->department) == "Conferencia")
			return true;
		if(ucfirst($order->getStatus()->onGoingStatus()) == "Delivering" && 
			ucfirst($this->department) == "Entrega")
			return true;
		return false;
	}

	public function OrdersByMyDep($orders)
	{
		$my_orders = array();
		$others = array();

		foreach ($orders as $order) {
			if($this->isInMyDepartment($order)){
				array_push($my_orders,$order);
			}else{
				array_push($others,$order);
			}
		}

		return array_merge($my_orders,$others);
	}

	/**
	 * Get the value of department
	 */ 
	public function getDepartment()
	{
		return $this->department;
	}

	/**
	 * Set the value of department
	 *
	 * @return  self
	 */ 
	public function setDepartment($department)
	{
		$this->department = $department;

		return $this;
	}

	/**
	 * Get the value of attendances_time
	 */ 
	public function getAttendances_time()
	{
		return $this->attendances_time;
	}

	/**
	 * Set the value of attendances_time
	 *
	 * @return  self
	 */ 
	public function setAttendances_time($attendances_time)
	{
		$this->attendances_time = $attendances_time;

		return $this;
	}

	/**
	 * Get the value of attendances_qnty
	 */ 
	public function getAttendances_qnty()
	{
		return $this->attendances_qnty;
	}

	/**
	 * Set the value of attendances_qnty
	 *
	 * @return  self
	 */ 
	public function setAttendances_qnty($attendances_qnty)
	{
		$this->attendances_qnty = $attendances_qnty;

		return $this;
	}
}