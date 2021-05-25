<?php 

Class Item{
	private $id_item;
	private $product=items;
	private $qnty_item;
	private $price_item;
	private $destination_order=Address;
	private $payment_order=Credcard;
	private $owner=Customer;
	private $rate_value;
	private $status_order=OrderStatus;

	public function delete_Item(){

	}
	public function finByID_item($id_order){
		return  $item;
	}
	public function update_item(){
		return $bool;
	}
	public function all_item(){
		return $list_order;
	}
	public function insert_Item(){
		return $bool;
	}

}