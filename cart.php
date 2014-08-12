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

// Output cart contents
	if (!$cart -> isEmpty()) {
		// Cart heading
			?>
				<h2>Cart Contents (<?= count($cart) ?> items)</h2>

				<table>
					<tr>
						<th>Item</th>
						<th>Price</th>
						<th>Quantity</th>
					</tr>

			<?
		// Cart contents
			foreach ($cart as $arr) {
		        $item = $arr['item'];
		        
		        // Output item row
			        echo "<tr>";
			        printf('<td><strong>%s</strong>: </td>', $item->getName());
			        printf('<td>$%0.2f</td>', $item->getPrice());
			        printf('<td>%d</td>', $arr['qty']);
			        echo "</tr>";
		    }

		// Cart total
		    echo "<tr>";
		    printf('<td><strong>Total</strong>: $%0.2f </td>', $cart -> getTotal());
		    echo "</tr>";
		    echo "</table>";		    
	} else {
		// Empty cart heading
			echo "<h2>Cart is empty</h2>";
	}

// Store cart in our session
	$_SESSION['cart'] = $cart;

?>