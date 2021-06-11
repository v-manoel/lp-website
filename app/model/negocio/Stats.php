<?php

require './Order.php';

class Stats
{
	private $orders = array();
	private $products_stats = array(); //map product => stats 	
	private $customers_stats = array(); //map customer => stats
	private $employees_stats = array(); //map employee => stats
	private $departments_stats = array(); //map department => stats
	private $districts_stats = array(); //map district name => stats
	
	
	public function __construct()
	{
		
		$order = new Order();
		$this->orders = $order->all();	
	}

	public function dateStats($date){
		$order = new Order();
		$order->setDate($date);
		$this->orders = $order->all();
	}
	
	//Employee stats
	public function totalAttendanceTimeByEmployees()
	{
		$this->employees_stats = array();
		foreach($this->orders as $order){
			$all_status = $order->statusHistory();
			//Must ignore the last status to calculate attendance time intervals
			for($index = 1; $index < sizeof($all_status); $index++){

				$attendance_time = $all_status[$index]->getDate() - $all_status[$index -1]->getDate();

				$be_found = -1;
				for($e_index = 0; $e_index < sizeof($this->employee_stats); $e_index++)
				{
					if($this->employee_stats[$e_index]->getId() == $all_status[$index]->getModifier()->getId()){
						$be_found = $e_index;
					}
				}
				if($be_found != -1){
					$this->employee_stats[$be_found]->setAttendances_time($this->employee_stats[$be_found]->getAttendances_time() + $attendance_time);
				
				}else{
					$all_status[$index]->getModifier()->setAttendances_time($attendance_time);
					array_push($this->employee_stats,$all_status[$index]->getModifier());
				}


			}
		}

		return $this->employee_stats;
	}

	public function totalAttendanceQntyByEmployees()
	{
		$this->employees_stats = array();
		foreach($this->orders as $order){
			$all_status = $order->statusHistory();
			//Must skip the first status that there isn't a modifier
			for($index = 1; $index < sizeof($all_status); $index++){

				$be_found = -1;
				for($e_index = 0; $e_index < sizeof($this->employee_stats); $e_index++)
				{
					if($this->employee_stats[$e_index]->getId() == $all_status[$index]->getModifier()->getId()){
						$be_found = $e_index;
					}
				}
				if($be_found != -1){
					$this->employee_stats[$be_found]->setAttendances_qnty($this->employee_stats[$be_found]->getAttendances_qnty() +1);
				
				}else{
					$all_status[$index]->getModifier()->setAttendances_qnty(1);
					array_push($this->employee_stats,$all_status[$index]->getModifier());
				}

			}
		}

		return $this->employees_stats;
	}

	//Department stats
	public function totalAttendanceTimeByDepartments()
	{
		$this->departments_stats = array();
		
		$this->totalAttendanceTimeByEmployees();
		foreach ($this->employees_stats as $employee){
			$this->departments_stats[$employee->getDepartment()] += $employee->getAttendances_time();
		}

		return $this->departments_stats;
	}

	public function totalAttendanceQntyByDepartments()
	{
		$this->departments_stats = array();
		
		$this->totalAttendanceQntyByEmployees();
		foreach ($this->employees_stats as $employee){
			$this->departments_stats[$employee->getDepartment()] += $employee->getAttendances_qnty();
		}

		return $this->departments_stats;
	}

	//Products stats
	public function totalSalesByProducts()
	{
		$this->products_stats = array();
		foreach($this->orders as $order){
			foreach($order->getItems() as $item){
				$be_found = -1;
				for($index = 0; $index < sizeof($this->products_stats); $index++)
				{
					if($this->products_stats[$index]->getId() == $item->getProduct()->getId()){
						$be_found = $index;
					}
				}
				if($be_found != -1){
					$this->products_stats[$be_found]->setTotal_sales($this->products_stats[$be_found]->getTotal_sales() + $item->getPrice());
				
				}else{
					$item->getProduct()->setTotal_sales($item->getPrice());
					array_push($this->products_stats,$item->getProduct());
				}
			}
		}

		return $this->products_stats;
	}

	public function totalOrdersByProducts()
	{
		$this->products_stats = array();
		foreach($this->orders as $order){
			foreach($order->getItems() as $item){
				$be_found = -1;
				for($index = 0; $index < sizeof($this->products_stats); $index++)
				{
					if($this->products_stats[$index]->getId() == $item->getProduct()->getId()){
						$be_found = $index;
					}
				}
				if($be_found != -1){
					$this->products_stats[$be_found]->setTotal_sales($this->products_stats[$be_found]->getTotal_sales() + $item->getQnty());
				
				}else{
					$item->getProduct()->setTotal_sales($item->getQnty());
					array_push($this->products_stats,$item->getProduct());
				}
			}
		}

		return $this->products_stats;
	}

	//customers stats
	public function totalSalesByCustomers()
	{
		$this->customers_stats = array();
		foreach($this->orders as $order){
			$be_found = -1;
			for($index = 0; $index < sizeof($this->customers_stats); $index++)
			{
				if($this->customers_stats[$index]->getCpf() == $order->getOwner()->getCpf()){
					$be_found = $index;
				}
			}
			if($be_found != -1){
				$this->customers_stats[$be_found]->setTotal_sales($this->customers_stats[$be_found]->getTotal_sales() + $order->getPrice());
			
			}else{
				$order->getOwner()->setTotal_sales($order->getPrice());
				array_push($this->customers_stats,$order->getOwner());
			}
			
		}

		return $this->customers_stats;
	}

	public function totalOrdersByCustomers()
	{
		$this->customers_stats = array();
		foreach($this->orders as $order){
			$be_found = -1;
			for($index = 0; $index < sizeof($this->customers_stats); $index++)
			{
				if($this->customers_stats[$index]->getCpf() == $order->getOwner()->getCpf()){
					$be_found = $index;
				}
			}
			if($be_found != -1){
				$this->customers_stats[$be_found]->setTotal_sales($this->customers_stats[$be_found]->getTotal_sales() +1);
			
			}else{
				$order->getOwner()->setTotal_sales(1);
				array_push($this->customers_stats,$order->getOwner());
			}
		}

		return $this->customers_stats;
	}

	//District stats
	public function totalSalesByDistricts()
	{
		$this->districts_stats = array();
		foreach($this->orders as $order){
			//builds a map with an district as key and the sum of his orders price as value
			$this->districts_stats[$order->getDestination()->getDistrict()] += $order->getPrice();
		}

		return $this->districts_stats;
	}

	public function totalOrdersByDistricts()
	{
		$this->districts_stats = array();
		foreach($this->orders as $order){
			//builds a map with an user as key and the sum of his orders
			$this->districts_stats[$order->getDestination()->getDistrict()] += 1;
		}

		return $this->districts_stats;
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
