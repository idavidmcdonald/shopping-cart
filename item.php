<?php

/**
* 
*/
class Item 
{
	protected $id;
	protected $name;
	protected $price;

	// Construct a new item
		function __construct($id, $name, $price)
		{
			$this -> id = $id;
			$this -> name = $name;
			$this -> price = $price;

		}

	// Function that returns an items ID
		public function getId() {
			return $this -> id;
		}

	// Function that returns an items name
		public function getName() {
			return $this -> name;
		}

	// Function that returns an items price
		public function getPrice() {
			return $this -> price;
		}

}

?>