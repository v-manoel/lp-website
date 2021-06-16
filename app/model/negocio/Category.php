<?php 

require_once __DIR__."/../dao/CategoryDao.php";

Class Category{
	private $id;
	private $name;
	
	public function findByID(){
		$dao = new CategoryDao();
		$category = $dao->selectById($this);

		return $category;
	}

	public function findByName(){
		$dao = new CategoryDao();
		$category = $dao->selectByName($this);

		return $category;
	}

	public function all(){
		$dao = new CategoryDao();
		$categories = $dao->select($this);

		return $categories;
	}
	
	public function equals(Category $cat){
		return $this->getName() == $cat->getName();
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
	 * Get the value of name
	 */ 
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 *
	 * @return  self
	 */ 
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}
}