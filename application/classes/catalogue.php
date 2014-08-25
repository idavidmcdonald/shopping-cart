<?php
require "item.php";

/**
* Class for a catalogue to hold all the items in the store
* The Catalogue class should implement Countable so that you can use count() on a catalogue.
* The Catalogue class should implement Iterator so that you can loop through the catalogue's contents.
*/
class Catalogue implements Countable, Iterator {
	// Variable for all items in the catalogue
		protected $items = array();

	// Variables for our iterator functions
		protected $position = 0;
		protected $ids = array();

	// Construct a new catalogue
		function __construct() {
			$mysqli = new mysqli("localhost", "root", "root", "STORE");

			// Check connection
				if ($mysqli -> connect_errno) {
				    printf("Connect failed: %s\n", $mysqli -> connect_error);
				    exit();
				}

			// Get array of all items from the database
				if ($result = $mysqli -> query("SELECT * FROM ITEMS")) {
				    while ($item = $result -> fetch_assoc()) {
				        $items[$item['ID']] = new Item($item['ID'], $item['NAME'], $item['PRICE']);
				    	$this -> ids[] = $item['ID'];
				    }
				}

				$this -> items = $items;
		}

	// Function to check if an item exists in the catalogue based on its ID number. Returns the item if true
		public function ItemExists($id) {
				if (in_array($id, $this -> ids)) {
					return $item = $this -> items[$id];
				} 
				// Return false is not found
					return false;
			}

	// $items array is protected so we implement Countable and Iterable interfaces using the following methods
		// Countable interface: Function to count number of items in our catalogue
			public function count(){
				return count($this -> items);
			}

		// Iterator interface: Function to return the key of the current element
			public function key(){
				return $this -> position;
			}

		// Iterator interface: Function to move forward to the next element
			public function next(){
				$this -> position++;
			}

		// Iterator interface: Function to rewind the iterator to the first element
			public function rewind(){
				$this -> position = 0;
			}

		// Iterator interface: Function to check if the current position is valid
			public function valid(){
				return (isset($this -> ids[$this -> position]));
			}

		// Iterable interface: Function to return the current item
			public function current(){
				$index = $this -> ids[$this -> position];
				return $this -> items[$index];
			}

}