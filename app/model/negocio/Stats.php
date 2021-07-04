<?php

require_once __DIR__ . "/Order.php";
require_once __DIR__ . "/OrderStatus.php";

class Stats
{
	private $orders = array();
	private $products_stats = array(); //map product => stats 	
	private $customers_stats = array(); //map customer => stats
	private $employees_stats = array(); //array of employees
	private $departments_stats = array(); //map department => stats
	private $districts_stats = array(); //map district name => stats


	public function __construct()
	{

		$order = new Order();
		$this->orders = $order->all();
	}

	public function dateStats($date)
	{
		$order = new Order();
		$order->setDate($date);
		$this->orders = $order->all();
	}

	//Employee stats
	public function LoadEmployeeStats()
	{
		//Reset Employees_stats
		$this->employee_stats = array();

		//Iter for all atual orders
		foreach ($this->orders as $order) {
			$status = OrderStatus::allByOrder($order);
			//Must ignore the last status to calculate attendance time intervals
			for ($index = 0; $index < count($status) -1; $index++) {

				$diff_time = strtotime($status[$index]->getUpdate_time())/3600 - strtotime($status[$index +1]->getUpdate_time())/3600;

				//To not duplicate array keys
				$duplicated = -1;
				for($d_index = 0; $d_index < count($this->employee_stats); $d_index++){
					if($this->employee_stats[$d_index]->getCpf() == $status[$index]->getModifier()->getCpf()){
						$duplicated = $d_index;
					}
				}
				if($duplicated >= 0){
					$this->employee_stats[$duplicated]->setAttendances_time($this->employee_stats[$duplicated]->getAttendances_Time() + $diff_time);
					$this->employee_stats[$duplicated]->setAttendances_qnty($this->employee_stats[$duplicated]->getAttendances_qnty() +1);
				}else{
					$status[$index]->getModifier()->setAttendances_qnty(1);
					$status[$index]->getModifier()->setAttendances_time($diff_time);
					array_push($this->employee_stats, $status[$index]->getModifier());
				}
			}
		}

		foreach ($this->employee_stats as $employee) {
			$employee->setAttendances_time(round($employee->getAttendances_Time()/$employee->getAttendances_Qnty(),2));
		}

		usort($this->employee_stats, "Stats::cmpAttendanceQnty");
		return $this->employee_stats;
	}

	

	//Department stats
	public function totalAttendanceTimeByDepartments()
	{
		$this->departments_stats = array();

		foreach ($this->orders as $order) {
			$status = OrderStatus::allByOrder($order);
			for ($index = 1; $index < count($status); $index++) {

				$diff_time = strtotime($status[$index -1]->getUpdate_time())/3600 - strtotime($status[$index]->getUpdate_time())/3600;

				$this->departments_stats[$status[$index]->onGoingStatus()] += $diff_time;

			}
		}

		foreach ($this->departments_stats as $dep => $sts) {
			$this->departments_stats[$dep] = $sts /= count($this->orders);
		}

		return $this->departments_stats;
	}

	public function totalAttendanceQntyByDepartments()
	{
		$this->departments_stats = array();

		$this->LoadEmployeeStats();
		foreach ($this->employees_stats as $employee) {
			if(ucfirst($employee->getDepartment()) != "Gerente")
				$this->departments_stats[$employee->getDepartment()] += $employee->getAttendances_qnty();
		}

		return $this->departments_stats;
	}

	//Products stats
	public function LoadProductStats()
	{
		//Reset Products
		$this->products_stats = array();

		//Iter for all atual orders
		foreach ($this->orders as $order) {
			foreach ($order->getItems() as $item) {
				//To not duplicate array keys
				$duplicated = -1;
				for($d_index = 0; $d_index < count($this->products_stats); $d_index++){
					if($this->products_stats[$d_index]->getId() == $item->getProduct()->getId()){
						$duplicated = $d_index;
					}
				}
				if($duplicated >= 0){
					$this->products_stats[$duplicated]->setTotal_sales($this->products_stats[$duplicated]->getTotal_sales() + $item->getPrice());
					$this->products_stats[$duplicated]->setTotal_orders($this->products_stats[$duplicated]->getTotal_orders() +1);
					$this->products_stats[$duplicated]->setTotal_qnty($this->products_stats[$duplicated]->getTotal_qnty() + $item->getQnty());
					
				}else{
					$item->getProduct()->setTotal_sales($item->getPrice());
					$item->getProduct()->setTotal_orders(1);
					$item->getProduct()->setTotal_qnty($item->getQnty());
					array_push($this->products_stats, $item->getProduct());
				}
			}
		}

		usort($this->products_stats, "Stats::cmpTotalSales");

		return $this->products_stats;
	}

	//Category stats
	public function totalOrdersByCategory()
	{
		$this->products_stats = array();

		$categories_stats = array();
		$this->LoadProductStats();
		foreach ($this->products_stats as $product) {
			foreach ($product->getCategories() as $category){
				$categories_stats[$category->getName()] += $product->getTotal_orders();
			}
		}

		return $categories_stats;
	}

	public function totalSalesByCategory()
	{
		$this->products_stats = array();

		$categories_stats = array();
		$this->LoadProductStats();
		foreach ($this->products_stats as $product) {
			foreach ($product->getCategories() as $category){
				$categories_stats[$category->getName()] += $product->getTotal_sales();
			}
		}

		return $categories_stats;
	}

	//customers stats
	public function LoadCustomerStats()
	{
		//Reset Customers stats
		$this->customers_stats = array();

		//Iter for all atual orders
		foreach ($this->orders as $order) {
			//To not duplicate array keys
			$duplicated = -1;
			for($d_index = 0; $d_index < count($this->customers_stats); $d_index++){
				if($this->customers_stats[$d_index]->getCpf() == $order->getOwner()->getCpf()){
					$duplicated = $d_index;
				}
			}
			if($duplicated >= 0){
				$this->customers_stats[$duplicated]->setTotal_sales($this->customers_stats[$duplicated]->getTotal_sales() + $order->getPrice());
				$this->customers_stats[$duplicated]->setTotal_orders($this->customers_stats[$duplicated]->getTotal_orders() + 1);
				
			}else{
				$order->getOwner()->setTotal_sales($order->getPrice());
				$order->getOwner()->setTotal_orders(1);
				array_push($this->customers_stats, $order->getOwner());
			}
			
		}

		usort($this->customers_stats, "Stats::cmpTotalSales");

		return $this->customers_stats;
	}

	public function CustomerOrdersQnty(){
		$stats = array();
		
		
		foreach ($this->LoadCustomerStats() as $customer) {
			$stats[$customer->NamePieces()[0]] = $customer->getTotal_sales();
		}

		return $stats;
	}

	public function ProductsParticipation(){
		$stats = array();
		
		$this->LoadProductStats();
		$stats[$this->products_stats[0]->getTitle()] = $this->products_stats[0]->getTotal_orders();
		$stats[$this->products_stats[1]->getTitle()] = $this->products_stats[1]->getTotal_orders();
		for ($i=2; $i < count($this->products_stats); $i++) { 
			$stats["others"] += $this->products_stats[$i]->getTotal_orders();
		}

		return $stats;
	}

	public function ProductsSales(){
		$stats = array();
		
		$this->LoadProductStats();
		for ($i=0; $i < count($this->products_stats); $i++) { 
			$stats[$this->products_stats[$i]->getTitle()] += $this->products_stats[$i]->getTotal_sales();
		}

		return $stats;
	}


	//District stats
	public function totalSalesByDistricts()
	{
		$this->districts_stats = array();
		foreach ($this->orders as $order) {
			//builds a map with an district as key and the sum of his orders price as value
			$this->districts_stats[$order->getDestination()->getDistrict()] += $order->getPrice();
		}

		return $this->districts_stats;
	}

	public function totalOrdersByDistricts()
	{
		$this->districts_stats = array();
		foreach ($this->orders as $order) {
			//builds a map with an user as key and the sum of his orders
			$this->districts_stats[$order->getDestination()->getDistrict()] += 1;
		}

		return $this->districts_stats;
	}

	//District stats
	public function totalSalesByDate()
	{
		$date_stats = array();
		foreach ($this->orders as $order) {
			//builds a map with an district as key and the sum of his orders price as value
			$date_stats[$order->getDate()] += $order->getPrice();
		}

		return $date_stats;
	}

	public function totalOrdersByDate()
	{

		$date_stats = array();
		foreach ($this->orders as $order) {
			//builds a map with an user as key and the sum of his orders
			$date_stats[$order->getDate()] += 1;
		}

		return $date_stats;
	}

	public function totalOrdersPrice()
	{
		$total = 0.0;
		foreach ($this->orders as $order) {
			$total += $order->getPrice();
		}
		return $total;
	}

	public function totalOrdersQnty()
	{
		return count($this->orders);
	}


	public function GroupByDate($date, $method){

		call_user_func_array([$this->$method()],[]);
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

	public static function cmpAttendanceTime($employee1, $employee2){
		return $employee1->getAttendances_time() <= $employee2->getAttendances_time();
	}

	public static function cmpAttendanceQnty($employee1, $employee2){
		return $employee1->getAttendances_Qnty() <= $employee2->getAttendances_Qnty();
	}

	public static function cmpTotalSales($obj1, $obj2){
		return $obj1->getTotal_sales() <= $obj2->getTotal_sales();
	}
}
