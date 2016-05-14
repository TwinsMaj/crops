<?php
	include('includes/header.php');

?>

<div class="wrapper">
<table>
	<th>item</th>
	<th>name</th>
	<th>quantity</th>
	<th>price</th>
	<th>total price</th>
	<?php displayCart($conn); ?>
</table>
<?php

$chk = checkcart($conn, $_SESSION['cust_id']);

if($chk == true)
{
	echo '<a href="checkout.php" class="proceed">proceed to checkout </a>';
}

?>
</div>

<?php
	include('includes/footer.php');

?>