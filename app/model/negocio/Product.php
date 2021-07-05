<?php 

require_once __DIR__."/Category.php";
require_once __DIR__."/Item.php";
require_once __DIR__."/../dao/ProductDao.php";

Class Product{
	private $id = null;
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
	private $total_qnty = 0;
	private $rate = 0;

	public function findByID(){
		$dao = new ProductDao();
		return $dao->selectById($this);

	}

	public function all(){
		$dao = new ProductDao();
		$products = $dao->select($this);
		return $products;
	}

	public function update(){
		$dao = new ProductDao();
		return $dao->update($this);
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
		$products = $dao->allByCategory($category);
		
		return $products;
	}

	public function NumSold()
	{
		$sold = 0;
		foreach(Item::allByProduct($this) as $item) {
			$sold += $item->getQnty();
		}
		return $sold;
	}

	public function AverageRating()
	{
		$this->rate = 0;
		$prod_in_items = Item::allByProduct($this);
		if(count($prod_in_items)){
			foreach($prod_in_items  as $item) {
				$this->rate += $item->getRate();
			}

			$this->rate = intval(floor($this->rate/count($prod_in_items)));
		} 
		return $this->rate;
	}

	
	public function allBySimilarity()
	{
		
		$products = array();

		if($this->getSource() != ""){
			$product = new Product();
			$product->setSource($this->getSource());
			//Similar source
			$products = $product->all();
		}
		if($this->getTitle() != ""){
			$product = new Product();
			$product->setTitle($this->getTitle());
			//Similar Title
			$products = array_merge($products,$product->all());
		}

		if($this->getOffer() > 0){
			$product = new Product();
			$product->setOffer($this->getOffer());
			//Equals or biggest offer
			$products = array_merge($products,$product->all());
		}

		if($this->getPrice() > 0){
			$product = new Product();
			$product->setPrice($this->getPrice());
			//Equals or more expensive
			$products = array_merge($products,$product->all());
		}
		
		foreach ($this->categories as $category) {
			$products = array_merge($products, $this->allByCategory($category));
		}
		
		return $products;
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

		/**
	 * Get the value of total_qnty
	 */ 
	public function getTotal_qnty()
	{
		return $this->total_qnty;
	}

	/**
	 * Set the value of total_qnty
	 *
	 * @return  self
	 */ 
	public function setTotal_qnty($total_qnty)
	{
		$this->total_qnty = $total_qnty;

		return $this;
	}



	//static Functions

	public static function cmpPrice($product1, $product2){
		return $product1->offerPrice() >= $product2->offerPrice();
	}
	
	public static function cmpOffer($product1, $product2){
		return $product1->getOffer() <= $product2->getOffer();
	}

/* 	public static function cmpId($product1, $product2){
		return $product1->getId() <= $product2->getId();
	}

	public static function removeDuplicate($products){
		usort($products,'Product::cmpId');
		
		$id = $products[0]->getId();
		$new_list = array();
		array_push($new_list,$products[0]);
		foreach ($products as $prod) {
			if($prod->getId() != $id){
				$id = $prod->getId();
				array_push($new_list, $prod);
			}
		}
	} */

	public static function reducebyCategory($products, Category $category){
		$new_list = array();
		foreach ($products as $prod) {
			foreach ($prod->getCategories() as $cat) {
				if($cat->equals($category))
					array_push($new_list,$prod);
			}	
		}

		return $new_list;
	}

	public static function reducebySource($products, $source){
		$new_list = array();
		foreach ($products as $prod)
			if($prod->getSource() == $source)
				array_push($new_list,$prod);


		return $new_list;
	}

	public static function reducebyPriceLim($products, $price){
		$new_list = array();
		foreach ($products as $prod) 
			if($prod->offerPrice() <= $price)
				array_push($new_list,$prod);
				
		

		return $new_list;
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
}

