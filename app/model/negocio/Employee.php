<?php

require '../dao/EmployeeDao.php';

Class Employee extends User{
	private $department;
	//stats attributes
	private $attendances_time = 0.0;
	private $attendances_qnty = 0;


	public function WorksIn($department){
		return ($this->department == $department);
	}

	//Verifica se os usuário esta cadastrado no banco de dados
	public function checkCredentials(){
		$dao = new EmployeeDao();
		$employees = $dao->select($this);

		if(count($employees) == 1){
			$this->setCpf($employees[0]->getCpf());
			$this->setName($employees[0]->getName());
			$this->setEmail($employees[0]->getEmail());
			$this->setPswd($employees[0]->getPswd());
			return true;
		}else{
			return false;
		}
	}
	
	public function finByID($integer){
	}

	public function all(Employee $generic_employee = new Employee()){
		$dao = new EmployeeDao();
		$employees = $dao->select($generic_employee);

		return $employees;
	}

	public function update(){

	}

	public function insert(){


	}

	public function delete(){
		
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