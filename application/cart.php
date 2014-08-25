<?php 

// Store header
	require 'header.php';

// Output cart contents
	if (!$cart -> isEmpty()) {
			?>
				<!-- Cart Heading -->
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
			foreach ($cart as $arr) {
		        $item = $arr['item'];
		    ?>
		    		<!-- Item row -->
					<tr>
						<!-- Item name -->
			        	<td><? printf('<a href = "viewitem.php?id=%d">%s</a>', $item->getId(), $item->getName()) ?></td>

			        	<!-- Item price -->
			        	<td>$<? printf('%0.2f', $item->getPrice()) ?></td>

			        	<!-- Item quantity -->
						<td><? printf('%d', $arr['qty'])?></td>

			        	<td> 
			        		<!-- Add one item button -->
			        		<? printf('<a href = "additem.php?id=%s">', $item->getId()) ?> <button type="button" class="btn btn-success"><b>+</b></button></a>
			        		<!-- Remove one item button -->
			        		<? printf('<a href = "removeitem.php?id=%s">', $item->getId()) ?> <button type="button" class="btn btn-danger"><b>-</b></button></a>
			        	</td>
			        </tr>

			 <? } ?>

			<!-- Cart Total -->
		    <tr>
		    	<td><strong>Total:<? printf(' $%0.2f<strong>', $cart -> getTotal()) ?></td>
		    	<td></td>
		    	<td></td>
		    	<td></td>
		    </tr>
		</table>
		<button type="button" class="btn btn-primary">Checkout</button>
	</div>

	<? } else { ?>
		<!-- Empty cart heading -->
		<div class = 'col-md-12'>
			<h2>Cart is empty</h2>
		</div>

	<? } 

// HTML store footer
	require 'footer.html';
?>
