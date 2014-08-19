<?php
require "item.php";

/**
* Class for a catalogue to hold all the items in the store
*/
class Catalogue
{
	protected $items;

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
		        $items[] = new Item($item['ID'], $item['NAME'], $item['PRICE']);
		    }
		}

		$this -> items = $items;
	}

	// Function to return an array of all the items in the store
	public function getItems() {
			return $this -> items;
		}
}

?>
