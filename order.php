<?php 

include ('header.php');
include ('connect_db.php');

$t=time();
$cid = reset($_SESSION['cid']);
echo $cid;
$orderid=0;
$total=0;


$date=date('Y-m-d');
  foreach($_SESSION['id'] as $value)
	  {
		  $result = mysqli_query($con,"SELECT * FROM book where ISBN=$value");


              while($row = mysqli_fetch_array($result)){
	         $total=$total+$row['price'];
			  }
	  }
	  echo $total;
	  echo $t;
	  $sql = "INSERT INTO IOrder (CustomerID, OrderDate, total, timestamp)
VALUES ($cid,'$date' , $total, $t)";
if ($con->query($sql) === TRUE) {
	$result = mysqli_query($con,"SELECT * FROM IOrder where CustomerID=$cid && timestamp=$t");
 echo "successful";

while($row = mysqli_fetch_array($result)){
	$orderid= $row['OrderID'];
}
foreach($_SESSION['id'] as $value)
	  {
		 $sql = "INSERT INTO OrderItem (OrderID, ISBN)
VALUES ($orderid,'$value')";
	  }
 Header("refresh:0;url=checkout_final.php?oid=$orderid");
}
else
{
	echo "Error: " . $sql . "<br>" . $con->error;
	echo "not successful";
}
?>