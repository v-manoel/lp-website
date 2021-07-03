<?php

require_once __DIR__."/Department.php";
require_once __DIR__."/OrderStatus.php";
require_once __DIR__."/Item.php";

Class Check extends Department{
	
	function __construct(){
		parent::__construct();
		$name = "Conferencia";
	}

	public function ToNext_Department(Employee $employee, Order $order, $date){
		//Send order to next department changing this status
		$new_status = new OrderStatus;
		$new_status->setOrder($order);
		$new_status->setModifier($employee);
		$new_status->setUpdate_time($date);

		//if order isn't disponible, come back it to preparation department
		$new_status->setStatus("Checked");
		
		$new_status->insert();
	}

	public function ToBefore_Department(Employee $employee, Order $order, $date){
		//Send order to next department changing this status
		$new_status = new OrderStatus;
		$new_status->setOrder($order);
		$new_status->setModifier($employee);
		$new_status->setUpdate_time($date);

		//if order isn't disponible, come back it to preparation department
		$new_status->setStatus("Paid");
		
		$new_status->insert();
	}

	public function OrdersByMyDep($orders)
	{
		$this->orders = array();
		$others = array();

		foreach ($orders as $order) {
			if(ucfirst($order->getStatus()->onGoingStatus()) == "Checking"){
				array_push($this->orders,$order);
			}else{
				array_push($others,$order);
			}
		}

		return array_merge($this->orders,$others);
	}
	
	public function checkOrderDisponibility($order){
		foreach($order->getItems() as $item){
			if($item->getQnty() > $item->getStoraged_qnty())
				return false;
		}
		return true;
	}

}