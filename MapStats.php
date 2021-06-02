<?php

require './Order.php';

class Stats
{
	private $orders = array();
	private $products_stats = array(); //map product => stats 	
	private $costumers_stats = array(); //map costumer => stats
	private $employee_stats = array(); //map employee => stats
	private $department_stats = array(); //map department => stats
	private $district_stats = array(); //map district name => stats
	

	public function __construct()
	{
		
		$order = new Order();
		$this->orders = $order->all();	
	}

	//Employee stats
	public function totalAttendanceTimeByEmployees()
	{
		$this->employee_stats = array();
		foreach($this->orders as $order){
			$all_status = $order->statusHistory();
			//Must ignore the last status to calculate attendance time intervals
			for($index = 1; $index < sizeof($all_status); $index++){
				$this->employee_stats[$all_status[$index]->getModifier()] += $all_status[$index]->getDate() - $all_status[$index -1]->getDate();
			}
		}

		return $this->employee_stats;
	}

	public function totalAttendanceQntyByEmployees()
	{
		$this->employee_stats = array();
		foreach($this->orders as $order){
			$all_order_status = $order->statusHistory();
			//Must skip the first status that there isn't a modifier
			for($index = 1; $index < sizeof($all_order_status); $index++){
				$this->employee_stats[$all_order_status[$index]->getModifier()] += 1;
			}
		}

		return $this->employee_stats;
	}

	//Department stats
	public function totalAttendanceTimeByDepartment()
	{
		$this->department_stats = array();
		
		$this->totalAttendanceTimeByEmployees();
		foreach ($this->employee_stats as $employee => $time){
			$this->department_stats[$employee->getDepartment()] += $time;
		}
	}

	public function totalAttendanceQntyByDepartment()
	{
		$this->department_stats = array();
		
		$this->totalAttendanceQntyByEmployees();
		foreach ($this->employee_stats as $employee => $qnty){
			$this->department_stats[$employee->getDepartment()] += $qnty;
		}
	}

	//Products stats
	public function totalSalesByProducts()
	{
		$this->products_stats = array();
		foreach($this->orders as $order){
			foreach($order->getItems() as $item){
				$this->products_stats[$item->getProduct()] += $item->getPrice();
			}
		}

		return $this->products_stats;
	}

	public function totalOrdersByProducts()
	{
		$this->products_stats = array();
		foreach($this->orders as $order){
			foreach($order->getItems() as $item){
				$this->products_stats[$item->getProduct()] += $item->getQnty();
			}
		}

		return $this->products_stats;
	}

	//Costumers stats
	public function totalSalesByCostumers()
	{
		$this->costumers_stats = array();
		foreach($this->orders as $order){
			//builds a map with an user as key and the sum of his orders price as value
			$this->costumers_stats[$order->getOwner()] += $order->getPrice();
		}

		return $this->costumers_stats;
	}

	public function totalOrdersByCostumers()
	{
		$this->costumers_stats = array();
		foreach($this->orders as $order){
			//builds a map with an user as key and the sum of his orders
			$this->costumers_stats[$order->getOwner()] += 1;
		}

		return $this->costumers_stats;
	}

	//District stats
	public function totalSalesByDistrict()
	{
		$this->district_stats = array();
		foreach($this->orders as $order){
			//builds a map with an district as key and the sum of his orders price as value
			$this->district_stats[$order->getDestination()->getDistrict()] += $order->getPrice();
		}

		return $this->district_stats;
	}

	public function totalOrdersByDistrict()
	{
		$this->district_stats = array();
		foreach($this->orders as $order){
			//builds a map with an user as key and the sum of his orders
			$this->district_stats[$order->getDestination()->getDistrict()] += 1;
		}

		return $this->district_stats;
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
