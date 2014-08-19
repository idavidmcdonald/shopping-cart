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
echo '<div class = "row">';

// Create some items
	$i47 = new Item(47, "Bike pump", 14.99);
	$i49 = new Item(49, "Spare tyre", 46.99);
	$i22 = new Item(22, "Wrench", 3.00);

// Items array
	$items[] = $i47;
	$items[] = $i49;
	$items[] = $i22;

foreach ($items as $value) {
	?>

  <div class = "col-sm-6 col-md-4">
    <div class = "thumbnail">
      <img src = "placeholder.png" >
      <div class = "caption">
        <h3><?= $value -> getName() ?></h3>
        <p><a href = "viewitem.php?id=i<?= $value -> getId() ?>" class = "btn btn-primary" role = "button">View</a></p>
      </div>
    </div>
  </div>


	<?
}
?>

			</div>
		</div>
	</body>
</html>