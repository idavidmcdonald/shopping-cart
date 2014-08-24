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

// If the item exists in our catalogue then delete it from the cart
	if ($item = $catalogue -> ItemExists($item_id)) {
		// Delete item from cart
			$cart -> deleteItem($item);
	}

// Store cart in our session
	$_SESSION['cart'] = $cart;

header('Location: cart.php' );

?>