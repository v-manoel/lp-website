<?php 

require './Product.php';

Class Item{
	private $id;
	private Product $product;
	private $qnty;
	private $price;
	private $storaged_qnty;


	public function delete_Item(){

	}
	public function finByID_item($id){

	}
	public function update(){
	
	}
	public function all(Item $generic_item = new Item()){
		$dao = new ItemDao();
		$item = $dao->select($generic_item);

		return $item;
	}

	public function insert(){
	
	}


	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of product
	 */ 
	public function getProduct()
	{
		return $this->product;
	}

	/**
	 * Set the value of product
	 *
	 * @return  self
	 */ 
	public function setProduct($product)
	{
		$this->product = $product;
		$this->setQnty(1);

		return $this;
	}

	/**
	 * Get the value of qnty
	 */ 
	public function getQnty()
	{
		return $this->qnty;
	}

	/**
	 * Set the value of qnty
	 *
	 * @return  self
	 */ 
	public function setQnty($qnty)
	{
		$this->qnty = $qnty;
		
		if($this->product){
			$this->setPrice($this->qnty * $this->product->offerPrice());
		}

		return $this;
	}

	/**
	 * Get the value of price
	 */ 
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Set the value of price
	 *
	 * @return  self
	 */ 
	public function setPrice($price)
	{
		$this->price = $price;

		return $this;
	}

	/**
	 * Get the value of storaged_qnty
	 */ 
	public function getStoraged_qnty()
	{
		return $this->storaged_qnty;
	}

	/**
	 * Set the value of storaged_qnty
	 *
	 * @return  self
	 */ 
	public function setStoraged_qnty($storaged_qnty)
	{
		$this->storaged_qnty = $storaged_qnty;

		return $this;
	}
}