<?php 
// Store header
	require 'header.php';

// Create a new catalogue with all the stores items
	$catalogue = new Catalogue();

// Get item ID from url
	$item_id = $_GET['id'];

// Return the item with matching ID number
	$item = $catalogue -> ItemExists($item_id);

// Output item details
?>
<div class = "col-md-12">
	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title"><?= $item -> getName() ?>
    		<span class="panel-title pull-right"><? printf('$%0.2f', $item->getPrice()) ?></span></h3>
  		</div>
  		<div class="panel-body">
		  	<p>
		  		<img src = "../public/assets/placeholder.png" class = "img-thumbnail" style = "height: 200px">
		  	</p>
		    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum porttitor sapien id tortor tempus, lacinia malesuada lorem suscipit. Suspendisse tincidunt risus id ultrices viverra. Quisque at bibendum libero, quis aliquet velit. Curabitur eu porta magna, sit amet auctor augue. Aenean porta facilisis laoreet. Nam vel mollis nisi. Pellentesque et consectetur velit, ac pharetra justo. Cras ac massa eu nibh convallis eleifend. Sed volutpat tempor interdum. Vestibulum adipiscing, arcu sed lacinia mattis, sapien est consequat metus, ac suscipit dui elit id mauris. Curabitur sed sodales lectus. Aenean id magna egestas, mattis diam sed, sodales erat.

				In hac habitasse platea dictumst. Vivamus eleifend lacinia mauris vel fermentum. Sed ac lacus sed mi tempus vehicula quis in sapien. Morbi a dapibus magna. Sed gravida molestie tempor. Mauris velit nisi, faucibus ac interdum eu, ultrices accumsan risus. Sed metus arcu, scelerisque non nibh eget, porttitor fermentum nulla.
  			</p>
			<p><a href = "additem.php?id=<?= $item -> getId() ?>" class = "btn btn-primary" role = "button">Add to cart</a></p>
  		</div>
	</div>
</div>

<?
// HTML store footer
	require 'footer.html';
?>

