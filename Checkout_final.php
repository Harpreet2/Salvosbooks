<?php 
include ('header.php');
include ('connect_db.php');
$total=0;
$ord = 0;
if (isset($_GET['oid']))
{
	$ord = $_GET['oid'];
	foreach($_SESSION['id'] as $value)
	  {
		  $result = mysqli_query($con,"SELECT * FROM book where ISBN=$value");


              while($row = mysqli_fetch_array($result)){
	         $total=$total+$row['price'];
			  }
	  }
	?>
<div class="main" style="min-height:400px">
<p class="checkp"> Total Amount:$<?php echo $total ?></p>
<br>
<p class="checkp"> Pay using paypal </p>





<?php
$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
//Here we can used seller email id.
$merchant_email = 'harpreetpannu363@gmail.com';
//here we can put cancel URL when payment is not completed.
$cancel_return = 'https://harpreet95.fwd.wf/salvos/payment-cancelled.php';
//here we can put cancel URL when payment is Successful.
$success_return = 'https://harpreet95.fwd.wf/salvos/payment-successful.php';
//PayPal call this file for ipn
$notify_url = 'https://harpreet95.fwd.wf/Salvos/listener.php';
?>

<form name="myform" action="<?php echo $paypal_url;?>" method="post">
<input type="hidden" name="business" value="<?php echo $merchant_email;?>" />
<input type="hidden" name="notify_url" value="<?php echo $notify_url;?>" />
<input type="hidden" name="cancel_return" value="<?php echo $cancel_return;?>" />
<input type="hidden" name="return" value="<?php echo $success_return;?>" />
<input type="hidden" name="rm" value="2" />
<input type="hidden" name="lc" value="" />
<input type="hidden" name="no_shipping" value="1" />
<input type="hidden" name="no_note" value="1" />
<input type="hidden" name="mc_currency" value="AUD" />
<input type="hidden" name="page_style" value="paypal" />
<input type="hidden" name="charset" value="utf-8" />
<input type="hidden" name="item_number" value=<?php echo $ord; ?> />
<input type="hidden" name="cbt" value="Back to FormGet" />
<input type="hidden" value="_xclick" name="cmd"/>
<input type="hidden" name="amount" value=<?php echo $total; ?> />

<input type="image" alt="Make payments with PayPal - it's fast, free and secure!" name="submit" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" />
</form>
</div>
<?php
}
	include ('footer.php');
?>