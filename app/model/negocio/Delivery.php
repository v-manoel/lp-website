<?php

require './Department.php';
require './OrderStatus.php';
require './Item.php';

Class Check extends Department{

	public function ToNext_Department(Employee $employee, $date){
		//Send order to next department changing this status
		$new_status = new OrderStatus;
		$new_status->setOrder($this->selected_order);
		$new_status->setModifier($employee);
		$new_status->setUpdate_time($date);
		$new_status->setStatus("delivered");
		
		$new_status->insert();
	}
	
	//Controller - Rastreamento do pedido será obtido atráves da chamada do metodo status_history do produto selecionado
	//$this->selected_order->statusHistory();

}