<?php

require "shoppingcart.php";
require "item.php";

// Create some items
	$i1 = new Item(47, "Bike pump", 14.99);
	$i2 = new Item(49, "Spare tyre", 46.99);
	$i3 = new Item(22, "Wrench", 3.00);

// Create a new instance of a cart
	$cart = new ShoppingCart();

// Add some items to our cart
	$cart -> addItem($i2);
	$cart -> addItem($i3);
	$cart -> addItem($i3);
	$cart -> addItem($i1);
	$cart -> deleteItem($i1);

if (!$cart -> isEmpty()) {
	// Cart heading
		echo '<h2>Cart Contents (' . count($cart) . ' items)</h2>';

	// Cart contents
		foreach ($cart as $arr) {
	        $item = $arr['item'];
	        printf('<p><strong>%s</strong>: %d @ $%0.2f each.<p>', $item->getName(), $arr['qty'], $item->getPrice());
	    }

	// Cart total
	    printf('<p><strong>Total</strong>: $%0.2f', $cart -> getTotal());

} else {
	// Empty cart heading
		echo "<h2>Cart is empty</h2>";
}

?>