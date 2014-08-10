<?php

/**
* 
*/
class ShoppingCart{ 
	protected $items = array();

	// Function that returns a boolean if the shopping cart is empty/notempty
		public function isEmpty(){
			return (empty($this -> items));
		}

	// Function to add an item to the shopping card	
		public function addItem(Item $item){
			// Get the item id
				$id = $item -> getId();

			// Throw an exception if there is no id
				if (!$id) throw new Exception ('The cart requires item with unique ID values');

			// Add or update item in cart
				if (isset($this -> items[$id])) {
					$this -> updateItem($item, $this -> items[$id]['qty'] + 1);
				} else {
					$this -> items[$id] = array('item' => $item,
							                    'qty' => 1
							                    );
				}
		}

	// Function to update the quantity of an item in the shopping cart
		public function updateItem(Item $item, $qty){
			// Get the item id
				$id = $item -> getId();

			// Throw an exception if there is no id
				if (!$id) throw new Exception ('The cart requires item with unique ID values');

			// Delete or update item quantity
				if ($qty === 0) {
					$this -> deleteItem($item);
				} elseif (($qty > 0 ) AND ($qty != $this -> items[$id]['qty'])) {
					$this -> items[$id]['qty'] = $qty;
				}
		}

	// Function to remove an item from the shopping cart
		public function deleteItem(Item $item){
			// Get the item id
				$id = $item -> getId();

			// Throw an exception if there is no id
				if (!$id) throw new Exception ('The cart requires item with unique ID values');

			// Remove item from shopping cart
				if (isset($this -> items[$id])) {
					unset($this -> items[$id]);
				}
		}

}

?>