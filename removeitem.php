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
	$i1 = new Item(47, "Bike pump", 14.99);
	$i2 = new Item(49, "Spare tyre", 46.99);
	$i3 = new Item(22, "Wrench", 3.00);

$cart -> removeItem($i1);

// Store cart in our session
	$_SESSION['cart'] = $cart;

header('Location: cart.php' );

?>