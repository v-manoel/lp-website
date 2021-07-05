<?php 

require_once __DIR__."/Product.php";
require_once __DIR__."/Order.php";
require_once __DIR__."/../dao/ItemDao.php"; 

Class Item{
	private ?Product $product = null;
	private $qnty = 0;
	private $price = 0.0;
	private $storaged_qnty = 0;
	private ?Order $order = null; // OR private ?Order $order = null
	private $rate = 0;

	public function insert(){
		$dao = new ItemDao();
		return $dao->insert($this);
	}

	public function update(){
		$dao = new ItemDao();
		return $dao->update($this);
	}

	public function all(){
 		$dao = new ItemDao();
		$addresses = $dao->select($this);

		return $addresses;
	}

	public function findByID(){
		$dao = new ItemDao();
	 	$res = $dao->selectById($this);
		return $res; 
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

	/**
	 * Get the value of order
	 */ 
	public function getOrder()
	{
		return $this->order;
	}

	/**
	 * Set the value of order
	 *
	 * @return  self
	 */ 
	public function setOrder($order)
	{
		$this->order = $order;

		return $this;
	}

			/**
	 * Get the value of rate
	 */ 
	public function getRate()
	{
		return $this->rate;
	}

	/**
	 * Set the value of rate
	 *
	 * @return  self
	 */ 
	public function setRate($rate)
	{
		$this->rate = $rate;

		return $this;
	}
 
	public static function allByProduct(Product $product){
		$dao = new ItemDao();
		return $dao->selectByProduct($product);
	}


	public static function allByOrder(Order $order){
		$dao = new ItemDao();
		return $dao->selectByOrder($order);
	}

}