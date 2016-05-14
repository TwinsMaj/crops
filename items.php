<?php
	include('includes/header.php');

	$cat_id = $_GET['des_id'];

	$q = "SELECT * FROM product WHERE designer_id='$cat_id'";
			
	$r = mysqli_query($conn, $q) or die(mysqli_error());
			
	if(mysqli_num_rows($r) > 1)
	{
		echo'<section class="early">';
		echo '<div class="wrapper clearfix">';

		while($row = mysqli_fetch_array($r))
		{
			echo '<div class="wares">';

			echo '<img src="'.$row['image'].'" class="wares-box"/>';
			echo '<p class="p-name">'.$row['product_name'].'</p>';
			echo '<p class="p-man">'.$row['product_manifacturer'].'</p>';

			echo '<p class="p-price">'.number_format($row['price'], 2).'</p>';
			
			if(isset($_SESSION['cust_id']))
			{
				echo '<a href="add_cart.php?item_id='.$row['product_id'].'&
				des_id='.$row['designer_id'].'">add to cart</a>';
			}

			echo "</div>";
		}

		echo '<div>';
		echo '</section>';
	}


?>