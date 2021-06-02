<?php

require './Order.php';
require './Employee.php';

Abstract Class Department{
	protected Order $orders;
	protected Order $selected_order;
	

	public function __construct()
	{
		//builds the orders list when a new object is istantiated
		$orders = new Order();
		$orders = $orders->all();
	}

	public function ToNext_Department(Employee $employee, $date){
		//Send order to next department changing this status
	}


	/**
	 * Get the value of selected_order
	 */ 
	public function getSelected_order()
	{
		return $this->selected_order;
	}

	/**
	 * Set the value of selected_order
	 *
	 * @return  self
	 */ 
	public function setSelected_order($selected_order)
	{
		$this->selected_order = $selected_order;

		return $this;
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
}