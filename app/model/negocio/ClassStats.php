<?php

	Class Stats{
		private $employees;
		private $items;
		private $costumers;
		private $sales;
	
		public function getProduct_bySales(){
			return $list_item_stats;
		}
		public function getProduct_TotalSales(){
			return $list_item_stats;
		}

		public function getProduct_HistorySales($date, $integer){
			return $list_item_stats;
		}
		public function getCustomer_HistorySales($date, $integer){
			return $list_CostomerStats;
		}
		public function getCustomer_byTotal_sales(){
			return $list_CostomerStats;
		}
		public function getDepartment_latency($string){
			return $real;
		}
	}