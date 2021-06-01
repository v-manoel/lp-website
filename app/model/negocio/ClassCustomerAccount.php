<?php

Class CustomerAccount{
	private $costumer;
	private $my_Cards;
	private $my_Orders;
	private $email;
	private $my_address;

	public function Add_address($Adress){
		return $bool;
	}
	public function Add_Credcard($Credcart){
		return $bool;
	}
	public function Delete_Address($Address){
		return $bool;
	}
	public function Change_Address($Address){
		return $bool;

	}
	public function Change_Credcard($Credcard){
		return $bool;
	}
	public function CheckCredentials($cpf){
		return $bool;
	}
	public function Cope_Order($id_Order){
		return $bool;
	}

}