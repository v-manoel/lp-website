<?php 

require './Category.php';

Class Product{
	private $id;
	private $title;
	private $description;
	private $imgs;
	private $price;
	private $offer;
	private Category $category;
	private $source;

	//stats attributes
	private $total_orders = 0;
	private $total_sales = 0.0;

	public function finByID($id){

	}

	public function all(Product $generic_product = new Product()){
		$dao = new ProductDao();
		$products = $dao->select($generic_product);

		return $products;
	}


	
	public function offerPrice(){
		return $this->price + ($this->price * $this->offer);
	}

	/**
	 * Get the value of source
	 */ 
	public function getSource()
	{
		return $this->source;
	}

	/**
	 * Set the value of source
	 *
	 * @return  self
	 */ 
	public function setSource($source)
	{
		$this->source = $source;

		return $this;
	}

	/**
	 * Get the value of category
	 */ 
	public function getCategory()
	{
		return $this->category;
	}

	/**
	 * Set the value of category
	 *
	 * @return  self
	 */ 
	public function setCategory($category)
	{
		$this->category = $category;

		return $this;
	}

	/**
	 * Get the value of offer
	 */ 
	public function getOffer()
	{
		return $this->offer;
	}

	/**
	 * Set the value of offer
	 *
	 * @return  self
	 */ 
	public function setOffer($offer)
	{
		$this->offer = $offer;

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
	 * Get the value of imgs
	 */ 
	public function getImgs()
	{
		return $this->imgs;
	}

	/**
	 * Set the value of imgs
	 *
	 * @return  self
	 */ 
	public function setImgs($imgs)
	{
		$this->imgs = $imgs;

		return $this;
	}

	/**
	 * Get the value of description
	 */ 
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Set the value of description
	 *
	 * @return  self
	 */ 
	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * Get the value of title
	 */ 
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Set the value of title
	 *
	 * @return  self
	 */ 
	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
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
	 * Get the value of total_orders
	 */ 
	public function getTotal_orders()
	{
		return $this->total_orders;
	}

	/**
	 * Set the value of total_orders
	 *
	 * @return  self
	 */ 
	public function setTotal_orders($total_orders)
	{
		$this->total_orders = $total_orders;

		return $this;
	}

	/**
	 * Get the value of total_sales
	 */ 
	public function getTotal_sales()
	{
		return $this->total_sales;
	}

	/**
	 * Set the value of total_sales
	 *
	 * @return  self
	 */ 
	public function setTotal_sales($total_sales)
	{
		$this->total_sales = $total_sales;

		return $this;
	}
}