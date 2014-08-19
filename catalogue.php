<?php
require "item.php";

/**
* Class for a catalogue to hold all the items in the store
*/
class Catalogue
{
	protected $items = array();

	function __construct()
	{
		$mysqli = new mysqli("localhost", "root", "root", "STORE");

		// Check connection
		if ($mysqli -> connect_errno) {
		    printf("Connect failed: %s\n", $mysqli -> connect_error);
		    exit();
		}

		// Get array of all items
		if ($result = $mysqli -> query("SELECT * FROM ITEMS")) {
		    while ($item = $result -> fetch_assoc()) {
		        $items[$item['ID']] = new Item($item['ID'], $item['NAME'], $item['PRICE']);
		    }
		}

		$this -> items = $items;
		$this -> ids = $ids;
	}

	// Function to return an array of all the items in the store
		public function getItems() {
				return $this -> items;
			}

	// Function to check if an item exists in the catalogue based on its ID number. Returns the item if true
		public function ItemExists($id) {
				if (array_key_exists($id, $this -> items)) {
					return $item = $this -> items[$id];
				} else {
					throw new Exception ('There is no item with this ID');
				}
			}

}