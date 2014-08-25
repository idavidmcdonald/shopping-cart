<?php

require "classes/shoppingcart.php";
require "classes/catalogue.php";

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

// If the item exists in our catalogue then add it to the cart
	if ($item = $catalogue -> ItemExists($item_id)) {
		// Add item to cart
			$cart -> addItem($item);
	}

// Store cart in our session
	$_SESSION['cart'] = $cart;

header('Location: cart.php' );

?>