<?php

require_once "classes/shoppingcart.php";
require_once "classes/catalogue.php";
require_once 'session.php';

// Create a new catalogue with all the stores items
	$catalogue = new Catalogue();

// Get item ID from url
	$item_id = $_GET['id'];

// If the item exists in our catalogue then delete it from the cart
	if ($item = $catalogue->itemExists($item_id)) {
		// Delete item from cart
			$cart->deleteItem($item);
	}

// Store cart in our session
	$_SESSION['cart'] = $cart;

header('Location: cart.php' );

?>