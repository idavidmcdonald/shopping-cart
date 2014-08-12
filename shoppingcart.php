<?php

/**
* 
*/
class ShoppingCart implements Countable, Iterator{ 
	// The items in the shopping cart
		protected $items = array();

	// Variables for our iterator functions
		protected $position = 0;
		protected $ids = array();

	// Construct a new shopping cart
		function __construct()
			{
				$this -> items = array();
			}

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

			// Update or add item in cart
				if (isset($this -> items[$id])) {
					// Update quantity of item
						$this -> updateItem($item, $this -> items[$id]['qty'] + 1);
				} else {
					// Add item to cart
						$this -> items[$id] = array('item' => $item,
								                    'qty' => 1
								                    );
						$this -> ids[] = $id;
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

				$index = array_search($id, $this -> ids);
				unset($this -> ids[$index]);
				$this -> ids = array_values($this -> ids);
		}

	// Function to calculate the total price of the shopping cart
		public function getTotal(){
			$total = 0;

			foreach ($this -> items as $id) {
							$subtotal = $id['qty'] * ($id['item'] -> getPrice());
							$total += $subtotal;
						}

			return $total;			
		}

	// $items array is protected so we implement Countable and Iterable interfaces for commonly used methods
		// Countable interface: Function to count number of items in our cart
			public function count(){
				$count = 0;

				foreach ($this -> items as $item) {
					$count += $item['qty'];
				}

				return $count;
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

?>