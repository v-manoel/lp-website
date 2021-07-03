<?php

require_once __DIR__."/Department.php";
require_once __DIR__."/OrderStatus.php";
require_once __DIR__."/Item.php";

Class Preparation extends Department{

	function __construct(){
		parent::__construct();
		$name = "Preparation";
	}

	public function ToNext_Department(Employee $employee, $order, $date){
		//Send order to next department changing this status
		$new_status = new OrderStatus;
		$new_status->setOrder($order);
		$new_status->setModifier($employee);
		$new_status->setUpdate_time($date);
		$new_status->setStatus("Prepared");
		
		return $new_status->insert();
	}

	public function OrdersByMyDep($orders)
	{
		$this->orders = array();
		$others = array();

		foreach ($orders as $order) {
			if(ucfirst($order->getStatus()->onGoingStatus()) == "Preparing"){
				array_push($this->orders,$order);
			}else{
				array_push($others,$order);
			}
		}

		return array_merge($this->orders,$others);
	}

	public function storagedItemQnty(Item $item, $storaged_qnty)
	{
			$item->setStoraged_qnty($storaged_qnty);
			$item->update();
	}
	
}