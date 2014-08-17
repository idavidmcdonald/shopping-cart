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

echo "Store<br>";
printf('<a href = "cart.php">View my cart (%d items)</a><br>', $cart -> count());

?>

<a href = "viewitem.php?id=i47">Bike pump</a><br>
<a href = "viewitem.php?id=i49">Spare tyre</a><br>
<a href = "viewitem.php?id=i22">Wrench</a><br>