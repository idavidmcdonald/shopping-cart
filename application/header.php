<!DOCTYPE html>
<html>
  	<head>
	    <title>My Store</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link href="../public/css/bootstrap.min.css" rel="stylesheet" media="screen">
	</head>

	<body>
		<div class = "container">	

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
?>

<!-- Store header -->
<div class = "row">
	<div class = "col-md-12">
		<h1>
			Welcome to the Store
			<span class = "pull-right">
				<a href = "index.php" class = "btn btn-primary" role = "button">Store Home</a>
				<a href = "cart.php" class = "btn btn-primary" role = "button">View Cart (<?= $cart -> count() ?> items)</a>	 					
			</span>
		</h1>
	</div>
</div>
<hr>
<!-- End: Store header -->

<div class = "row">