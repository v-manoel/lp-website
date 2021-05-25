<?php 

Class Address{
	private $id_address;
	private $UF_address;
	private $city=City;
	private $district_address;
	private $street_address;
	private $number_address;
	private $description_address;

	
	public function insert_Address(){
		return $bool;
	}
	public function update_Address(){
		return $bool;
	}
	public function all_Address(){
		return $list_Address;
	}
	public function finByID($id_address){
		return $address;;
	}
	
	
	
	public function delete_Address(){
		return $bool;;
	}
	
}