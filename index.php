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
?>
<div class = "row">
	<div class = "col-md-12">
		<h1>
			Welcome to the Store
			<a href = "cart.php" class = "btn btn-primary pull-right" role = "button">View Cart (<?= $cart -> count() ?> items)</a>	
		</h1>
	</div>
</div>
<hr>

<div class = "row">
<?
//printf('<a href = "cart.php">View my cart (%d items)</a><br>', $cart -> count());
// Output all items in the catalogue
	$catalogue = new Catalogue();

	foreach ($catalogue as $item) {
		?>

	  <div class = "col-sm-6 col-md-4">
	    <div class = "thumbnail">
	      <img src = "placeholder.png" >
	      <div class = "caption">
	        <h3>
	        	<?= $item -> getName() ?>
	        	<a href = "viewitem.php?id=<?= $item -> getId() ?>" class = "btn btn-primary pull-right" role = "button">View</a>
	    	</h3>
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