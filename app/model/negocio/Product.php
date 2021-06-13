<?php 

require_once __DIR__."/Category.php";
require_once __DIR__."/../dao/ProductDao.php";

Class Product{
	private $id;
	private $title = "";
	private $description = "";
	private $imgs = array();
	private $price = 0.0;
	private $offer = 0.0;
	private $categories = array();
	private $source = "";

	//stats attributes
	private $total_orders = 0;
	private $total_sales = 0.0;

	public function findByID(){
		$dao = new ProductDao();
		$products = $dao->selectById($this);

		return $this;
	}

	public function all(){
		$dao = new ProductDao();
		$products = $dao->select($this);
		return $products;
	}

	public function offerPrice(){
		return round(($this->price - ($this->price * $this->offer)),2);
		
	}

	public function offerAsPerc(){
		return $this->offer * 100;
	}

	public function addImg($img)
	{
		array_push($this->imgs, $img);
	}

	public function addCategory(Category $category)
	{
		array_push($this->categories, $category);
	}

	public function allByCategory(Category $category)
	{
		$dao = new ProductDao();
		return $dao->allByCategory($category);
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
	 * Get the value of categories
	 */ 
	public function getCategories()
	{
		return $this->categories;
	}

	/**
	 * Set the value of categories
	 *
	 * @return  self
	 */ 
	public function setCategories($categories)
	{
		$this->category = $categories;

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