<?php 

require_once __DIR__."/Employee.php";
require_once __DIR__."/Order.php";
require_once __DIR__."/../dao/OrderStatusDao.php";

Class OrderStatus{
	private $id;
	private $status;
	private $update_time;
	private Employee $modifier;
	private Order $order;
	
	public function finByID($id){

	}
	public function update(){

	}
	public function all(){
		/*Se order estiver setado este método pode ser utilizado para retornar
		 todos os status da order segundo a implementação do select no dao*/
		
		$dao = new OrderStatusDao();
		$orders_status = $dao->select($this);

		return $orders_status;
	}


	public function insert(){

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
}