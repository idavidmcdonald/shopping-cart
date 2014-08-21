<?php 

// Store header
	require 'header.php';

// Output cart contents
	if (!$cart -> isEmpty()) {
		// Cart heading
			?>
				<div class = "col-md-12">
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
			        // Item name (as a link)
			        	printf('<td><a href = "viewitem.php?id=%d">%s</a></td>', $item->getId(), $item->getName());
			        // Item price
			        	printf('<td>$%0.2f</td>', $item->getPrice());
			        // Item quantity
						printf('<td>%d</td>', $arr['qty']);
					// Add one item button
			        	printf('<td><a href = "additem.php?id=%s"><button type="button" class="btn btn-success"><b>+</b></button></a>', $item->getId());
			        // Remove one item button
			        	printf(' <a href = "removeitem.php?id=%s"><button type="button" class="btn btn-danger"><b>-</b></button></a></td>', $item->getId());
			        echo "</tr>";
		    }

		// Cart total
		    echo "<tr>";
		    printf('<td><strong>Total: $%0.2f<strong></td>', $cart -> getTotal());
		    echo "<td></td><td></td><td></td></tr>";
		    echo "</table>";
		    echo '<button type="button" class="btn btn-primary">Checkout</button>';	
		    echo "</div>";	    
	} else {
		// Empty cart heading
			echo "<div class = 'col-md-12'>";
			echo "<h2>Cart is empty</h2>";
			echo "</div>";
	}

// HTML store footer
	require 'footer.html';
?>
