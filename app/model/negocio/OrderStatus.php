<?php 

require_once __DIR__."/Employee.php";
require_once __DIR__."/Order.php";
require_once __DIR__."/../dao/OrderStatusDao.php";

Class OrderStatus{
	private $id = null;
	private $status = ""; //paid - separated - checked - delivered
	private $update_time = null;
	private ?Employee $modifier = null;
	private ?Order $order = null;
	
	public function insert(){
		$dao = new OrderStatusDao();
		return $dao->insert($this);
	}

	public function update(){
		$dao = new OrderStatusDao();
		return $dao->update($this);
	}

	public function all(){
 		$dao = new OrderStatusDao();
		$addresses = $dao->select($this);

		return $addresses;
	}

	public function findByID(){
		$dao = new OrderStatusDao();
	 	$res = $dao->selectById($this);
		return $res; 
	}


	public function onGoingStatus()
	{
		//paid - separated - checked - delivered
		switch (ucfirst($this->status)) {
			case 'Paid':
				return "Separating";
			case 'Separated':
				return "Checking";
			case 'Checked':
				return "Delivering";
		}
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
	 * Get the value of status
	 */ 
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Set the value of status
	 *
	 * @return  self
	 */ 
	public function setStatus($status)
	{
		$this->status = $status;

		return $this;
	}

	/**
	 * Get the value of update_time
	 */ 
	public function getUpdate_time()
	{
		return $this->update_time;
	}

	/**
	 * Set the value of update_time
	 *
	 * @return  self
	 */ 
	public function setUpdate_time($update_time)
	{
		$this->update_time = $update_time;

		return $this;
	}

	/**
	 * Get the value of modifier
	 */ 
	public function getModifier()
	{
		return $this->modifier;
	}

	/**
	 * Set the value of modifier
	 *
	 * @return  self
	 */ 
	public function setModifier($modifier)
	{
		$this->modifier = $modifier;

		return $this;
	}

	/**
	 * Get the value of order
	 */ 
	public function getOrder()
	{
		return $this->order;
	}

	/**
	 * Set the value of order
	 *
	 * @return  self
	 */ 
	public function setOrder($order)
	{
		$this->order = $order;

		return $this;
	}

	public static function allByEmployee(Employee $employee){
		$dao = new OrderStatusDao();
		return $dao->selectByEmployee($employee);
	}


	public static function allByOrder(Order $order){
		$dao = new OrderStatusDao();
		return $dao->selectByOrder($order);
	}
}