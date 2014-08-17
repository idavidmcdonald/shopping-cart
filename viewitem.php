<?php
require "shoppingcart.php";
require "item.php";

// Start session. If session ShoppingCart exists, set as $cart variable. If not create a new instance of a ShoppingCart
	session_start();
	 
	if (isset($_SESSION['cart'])) {
	    $cart = $_SESSION['cart'];
	} else {
	    $cart = new ShoppingCart();
	}

// Create some items
	$i47 = new Item(47, "Bike pump", 14.99);
	$i49 = new Item(49, "Spare tyre", 46.99);
	$i22 = new Item(22, "Wrench", 3.00);

// Get item 
	$item_id = $_GET['id'];

// Output item details
	echo $$item_id -> getName();
	echo "<br>";
	echo $$item_id -> getPrice();
	echo "<br>";
	printf('<a href = "additem.php?id=i%s">Add item to cart</a><br>', $$item_id -> getId());
	printf('<a href = "cart.php">View my cart (%d items)</a>', $cart -> count());

?>

