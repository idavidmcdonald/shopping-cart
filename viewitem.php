<?php
require "shoppingcart.php";
require "catalogue.php";

// Start session. If session ShoppingCart exists, set as $cart variable. If not create a new instance of a ShoppingCart
	session_start();
	 
	if (isset($_SESSION['cart'])) {
	    $cart = $_SESSION['cart'];
	} else {
	    $cart = new ShoppingCart();
	}

// Create a new catalogue with all the stores items
	$catalogue = new Catalogue();

// Get item ID from url
	$item_id = $_GET['id'];

// Return the item with matching ID number
	$item = $catalogue -> ItemExists($item_id);

// Output item details
	echo $item -> getName();
	echo "<br>";
	echo $item -> getPrice();
	echo "<br>";
	printf('<a href = "additem.php?id=%s">Add item to cart</a><br>', $item -> getId());
	printf('<a href = "cart.php">View my cart (%d items)</a>', $cart -> count());

?>

