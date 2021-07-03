<?php

require_once __DIR__."/Department.php";
require_once __DIR__."/OrderStatus.php";
require_once __DIR__."/Item.php";

Class Delivery extends Department{

	function __construct(){
		parent::__construct();
		$name = "Entrega";
	}

	public function ToNext_Department(Employee $employee, Order $order, $date){
		if(ucfirst($order->getStatus()->getStatus()) == "Checked"){
		//Send order to next department changing this status
		$new_status = new OrderStatus;
		$new_status->setOrder($order);
		$new_status->setModifier($employee);
		$new_status->setUpdate_time($date);
		$new_status->setStatus("Delivered");
		
		$new_status->insert();
		}
	}

	public function OrdersByMyDep($orders)
	{
		$this->orders = array();
		$others = array();

		foreach ($orders as $order) {
			if(ucfirst($order->getStatus()->onGoingStatus()) == "Delivering"){
				array_push($this->orders,$order);
			}else{
				array_push($others,$order);
			}
		}

		return array_merge($this->orders,$others);
	}
	
	//Controller - Rastreamento do pedido será obtido atráves da chamada do metodo status_history do produto selecionado
	//$this->selected_order->statusHistory();

}