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

// Create some items
	$i47 = new Item(47, "Bike pump", 14.99);
	$i49 = new Item(49, "Spare tyre", 46.99);
	$i22 = new Item(22, "Wrench", 3.00);

// Output cart contents
	if (!$cart -> isEmpty()) {
		// Cart heading
			?>
				<h2>Cart Contents (<?= count($cart) ?> items)</h2>

				<table class = "table">
					<tr>
						<th>Item</th>
						<th>Price</th>
						<th>Quantity</th>						
						<th></th>
					</tr>

			<?
		// Cart contents
			foreach ($cart as $arr) {
		        $item = $arr['item'];
		        
		        // Output item row
			        echo "<tr>";
			        printf('<td>%s </td>', $item->getName());
			        printf('<td>$%0.2f</td>', $item->getPrice());
					printf('<td>%d</td>', $arr['qty']);
			        printf('<td><a href = "additem.php?id=i%s"><button type="button" class="btn btn-success"><b>+</b></button></a>', $item->getId());
			        printf(' <a href = "removeitem.php?id=i%s"><button type="button" class="btn btn-danger"><b>-</b></button></a></td>', $item->getId());
			        echo "</tr>";
		    }

		// Cart total
		    echo "<tr>";
		    printf('<td><strong>Total: $%0.2f<strong></td>', $cart -> getTotal());
		    echo "<td></td><td></td><td></td></tr>";
		    echo "</table>";		    
	} else {
		// Empty cart heading
			echo "<h2>Cart is empty</h2>";
	}

// Store cart in our session
	//$_SESSION['cart'] = $cart;

?>

		</div>
	</body>
</html>