<?php 

Class Order{
	private $id_order;
	private $items_order=items[];
	private $date=Date;
	private $price_order;
	private $destination_order=Address;
	private $payment_order=Credcard;
	private $owner=Customer;
	private $rate_value;
	private $status_order=OrderStatus;

	public function delete_Order(){

	}
	public function finByID($id_order){

	}
	public function update_order(){
		return $bool;
	}
	public function all_order(){
		return $list_order;
	}
	public function insert_order(){
		return $bool;
	}
	public function AddProduct(){
		return $bool;
	}
	public function close_Order(){
		return $bool;
	}
	public function payOrder($id_credCard){
		return $bool;
	}
	public function SetDestination($id_address){
		return $bool;
	}
}