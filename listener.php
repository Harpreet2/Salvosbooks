<?php
include ('connect_db.php');
// STEP 1: read POST data
// Reading POSTed data directly from $_POST causes serialization issues with array data in the POST.
// Instead, read raw POST data from the input stream.
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
  $keyval = explode ('=', $keyval);
  if (count($keyval) == 2)
    $myPost[$keyval[0]] = urldecode($keyval[1]);
}
// read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
$req = 'cmd=_notify-validate';
if (function_exists('get_magic_quotes_gpc')) {
  $get_magic_quotes_exists = true;
}
foreach ($myPost as $key => $value) {
  if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
    $value = urlencode(stripslashes($value));
  } else {
    $value = urlencode($value);
  }
  $req .= "&$key=$value";
}
 
 

// Step 2: POST IPN data back to PayPal to validate
$ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
// In wamp-like environments that do not come bundled with root authority certificates,
// please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set
// the directory path of the certificate as shown below:
curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '\cert\cacert.pem');
if ( !($res = curl_exec($ch)) ) {
  // error_log("Got " . curl_error($ch) . " when processing IPN data");
file_put_contents('new.txt', print_r(curl_error($ch), true));
  curl_close($ch);
  exit;
}
curl_close($ch);
if (strcmp ($res, "VERIFIED") == 0) {
	file_put_contents('new1.txt', print_r($res, true));
 $txn = $_POST['txn_id'];
 $item = $_POST['item_number'];
 $amount = $_POST['mc_gross'];
 $pstatus = $_POST['payment_status'];
 $date = date("Y-m-d H:i:s");
 $sql = "INSERT INTO `payments` (txnid, payment_amount, payment_status, orderid, createdtime) VALUES ('$txn', $amount, '$pstatus', '$item', '$date')";
if ($con->query($sql) === TRUE) {
	
 echo "successful";
} 
else{
	$jp = "Error: " . $sql . "<br>" . $con->error;
	file_put_contents('new.txt', print_r($jp, true));
}
} else if (strcmp ($res, "INVALID") == 0) {
file_put_contents('new.txt', print_r($res, true));
}
?>