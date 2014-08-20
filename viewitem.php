<!DOCTYPE html>
<html>
  	<head>
	    <title>My Shopping Cart</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	</head>

	<body>
		<div class = "container">

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

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><?= $item -> getName() ?></h3>
  </div>
  <div class="panel-body">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum porttitor sapien id tortor tempus, lacinia malesuada lorem suscipit. Suspendisse tincidunt risus id ultrices viverra. Quisque at bibendum libero, quis aliquet velit. Curabitur eu porta magna, sit amet auctor augue. Aenean porta facilisis laoreet. Nam vel mollis nisi. Pellentesque et consectetur velit, ac pharetra justo. Cras ac massa eu nibh convallis eleifend. Sed volutpat tempor interdum. Vestibulum adipiscing, arcu sed lacinia mattis, sapien est consequat metus, ac suscipit dui elit id mauris. Curabitur sed sodales lectus. Aenean id magna egestas, mattis diam sed, sodales erat.

In hac habitasse platea dictumst. Vivamus eleifend lacinia mauris vel fermentum. Sed ac lacus sed mi tempus vehicula quis in sapien. Morbi a dapibus magna. Sed gravida molestie tempor. Mauris velit nisi, faucibus ac interdum eu, ultrices accumsan risus. Sed metus arcu, scelerisque non nibh eget, porttitor fermentum nulla.
  	</p>
	<p><a href = "additem.php?id=<?= $item -> getId() ?>" class = "btn btn-primary" role = "button">Add to cart</a></p>
  </div>
</div>

		</div>
	</body>
</html>

