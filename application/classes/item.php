<?php

/**
* Class for an individual item in our store
*/
class Item 
{
	protected $id;
	protected $name;
	protected $price;


	/**
	 * Set the properties for our item
	 * @param int $id
	 * @param string $name
	 * @param float $price
	 */
		function __construct($id, $name, $price)
		{
			$this->id = $id;
			$this->name = $name;
			$this->price = $price;

		}

	/**
	 * Get the ID for this item
	 * @return int 
	 */
	public function getId() {
		return $this->id;
	}


	/**
	 * Get the name for this item
	 * @return string 
	 */
	public function getName() {
		return $this->name;
	}


	/**
	 * Get the price of this item
	 * @return float
	 */
	public function getPrice() {
		return $this->price;
	}

}
