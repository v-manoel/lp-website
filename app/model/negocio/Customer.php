
<?php

require '../dao/CustomerDao.php';

Class Customer extends User{
	//stats attributes
	private $total_sales = 0.0;
	private $total_orders = 0;

	public function finByID($cpf){
		$dao = new CustomerDao();
		$customer = new Customer();
		$customer->setCpf($cpf);
		$customers = $dao->select($customer);

		if(count($customers) == 1){
			$this->setCpf($customers[0]->getCpf());
			$this->setName($customers[0]->getName());
			$this->setEmail($customers[0]->getEmail());
			$this->setPswd($customers[0]->getPswd());
			return true;
		}else{
			return false;
		}
	}

	public function all(Customer $generic_customer = new Customer()){
		$dao = new CustomerDao();
		$customers = $dao->select($generic_customer);

		return $customers;
	}

	public function update(){
		$dao = new CustomerDao();
		return $dao->update($this);
	}

	public function insert(){
		$dao = new CustomerDao();
		return $dao->insert($this);
	}


	public function delete(){
		$dao = new CustomerDao();
		return $dao->delete($this);
	}

	//Verifica se os usuário esta cadastrado no banco de dados
	public function checkCredentials(){
		$dao = new CustomerDao();
		$customers = $dao->select($this);

		if(count($customers) == 1){
			$this->setCpf($customers[0]->getCpf());
			$this->setName($customers[0]->getName());
			$this->setEmail($customers[0]->getEmail());
			$this->setPswd($customers[0]->getPswd());
			return true;
		}else{
			return false;
		}
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
}