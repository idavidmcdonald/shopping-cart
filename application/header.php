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
require_once "classes/shoppingcart.php";
require_once "classes/catalogue.php";
require_once 'session.php';
?>

<!-- Store header -->
<div class = "row">
	<div class = "col-md-12">
		<h1>
			Welcome to the Store
			<span class = "pull-right">
				<a href = "index.php" class = "btn btn-primary" role = "button">Store Home</a>
				<a href = "cart.php" class = "btn btn-primary" role = "button">View Cart (<?= $cart->count() ?> items)</a>	 					
			</span>
		</h1>
	</div>
</div>
<hr>
<!-- End: Store header -->

<div class = "row">