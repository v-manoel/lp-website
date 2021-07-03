<?php

require_once __DIR__."/Order.php";
require_once __DIR__."/Employee.php";

Abstract Class Department{
	private String $name = "";
	protected $orders = array();
	

	public function __construct()
	{
		//builds the orders list when a new object is istantiated
		
	}

	public function ToNext_Department(Employee $employee, Order $order, $date){
		//Send order to next department changing this status
	}

	public function OrdersByMyDep($orders)
	{
		$orders = new Order();
		$orders = $orders->all();
		$this->OrdersByMyDep($orders);
		$this->orders = $orders;
	}

	/**
	 * Get the value of orders
	 */ 
	public function getOrders()
	{
		return $this->orders;
	}

	/**
	 * Set the value of orders
	 *
	 * @return  self
	 */ 
	public function setOrders($orders)
	{
		$this->orders = $orders;

		return $this;
	}

	/**
	 * Get the value of name
	 */ 
	public function getName()
	{
		return $this->name;
	}
}