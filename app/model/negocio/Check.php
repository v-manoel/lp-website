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

		//if order isn't disponible, come back it to preparation department
		$this->checkOrderDisponibility() ? $new_status->setStatus("deliverying") : $new_status->setStatus("preparating");
		
		$new_status->insert();
	}
	
	public function checkOrderDisponibility(){
		$orderItems = $this->selected_order->getItems();
		foreach($orderItems as $item){
			if($item->getQnty() > $item->getStoraged_qnty())
				return false;
		}
		return true;
	}

}