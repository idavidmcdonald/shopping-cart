<?php
echo "Shopping Cart";

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

echo ($cart -> count());
echo ($cart -> getTotal());



?>