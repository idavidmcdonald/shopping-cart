<?php 
// Store header
	require_once 'header.php';

// Output all items in the catalogue
	$catalogue = new Catalogue();

	foreach ($catalogue as $item) {
		?>
		
	  	<div class = "col-sm-6 col-md-4">
	    	<div class = "thumbnail">
	      		<img src = "../public/assets/placeholder.png" >
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

// HTML store footer
	require_once 'templates/footer.html';	
?>

