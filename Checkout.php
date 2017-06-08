<?php 
include ('header.php');
include ('connect_db.php');

if(empty($_SESSION['cust']))
{
	 Header("refresh:0;url=register.php?ss=1");
}
?>
<div class="main" style="min-height:400px">
<p class="checkp"> If you want to change your address. Please go to your <a href="profile.php">Profile</a> and change it.  </p>

<p class="checkp"> OR </p>

<p class="checkout-btns"><a class="button dark big" href="order.php">Place order and pay</a> 
</div>

<?php
	include ('footer.php');
?>