<?php

require './Department.php';
require './OrderStatus.php';
require './Item.php';

Class Preparation extends Department{

	public function ToNext_Department(Employee $employee, $date){
		//Send order to next department changing this status
		$new_status = new OrderStatus;
		$new_status->setOrder($this->selected_order);
		$new_status->setModifier($employee);
		$new_status->setUpdate_time($date);
		$new_status->setStatus("checking");
		$new_status->insert();
	}

	public function storagedItemQnty(Item $item, $storaged_qnty)
	{
		if(in_array($item, $this->selected_order->getItems())){
			$item->setStoraged_qnty($storaged_qnty);
			$item->update();
		}
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