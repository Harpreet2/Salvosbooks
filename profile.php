<?php 

include ('header.php');
include ('connect_db.php');

?>
<script>
function FillBilling(f) {
  if(f.billingtoo.checked == true) {
     f.sadd.value = f.address.value ;
    f.szip.value = f.zip.value ;
	f.sstate.value = f.state.value ;
  }
}
</script>


<div class="main" style="min-height:700px">


<div class="primary1" style="width:100%;float:left;margin-left:10px">

  <h1 class="heading">Billing Address</h1>
  
<?php
$cid = reset($_SESSION['cid']);

if(isset($_POST['name']))
{

$name = $_POST['name'];
$address = $_POST['address'];
$zip = $_POST['zip'];
$state = $_POST['state'];
$sadd = $_POST['sadd'];
$szip = $_POST['szip'];
$sstate = $_POST['sstate'];
$sql = "UPDATE Customer SET CustomerName = '$name', Address = '$address', zip = '$zip', state = '$state', ShipAdd = '$sadd', shipzip = '$szip', shipstate = '$sstate' WHERE CustomerID = $cid";

if ($con->query($sql) === TRUE)
{
  echo '<p style="color:white">Updated successfully</p>';
}


}

$result = mysqli_query($con,"SELECT * FROM Customer where CustomerID= $cid");


while($row = mysqli_fetch_array($result)){
$custname= $row['CustomerName'];
$custAdd=$row['Address'];
$custZip=$row['zip'];
$custState=$row['state'];
$custSadd=$row['ShipAdd'];
$custSzip=$row['shipzip'];
$custSstate=$row['shipstate'];
}
  
 ?> 
    <form name="update"  action="<?php $_PHP_SELF ?>" method="POST">
    <ul class="form">
      
      <li class="field right">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $custname; ?>">
      </li>
    
      <li class="field left">
        <label>Address</label>
        <input type="text" name="address" value="<?php echo $custAdd; ?>">
      </li>
      <li class="field right">
        <label>ZIP</label>
        <input type="text" name="zip" value="<?php echo $custZip; ?>">
      </li>
	  <li class="field right">
        <label>State</label>
        <input type="text" name="state" value="<?php echo $custState; ?>">
      </li>
	       <h1 class="heading">Shipping Address</h1><br>
		   <input type="checkbox" name="billingtoo" onclick="FillBilling(this.form)">
<em>Same As Billing</em
	 <br><br><li class="field left">
        <label>Address</label>
        <input type="text" name="sadd" value="<?php echo $custSadd; ?>">
      </li>
      <li class="field right">
        <label>ZIP</label>
        <input type="text" name="szip" value="<?php echo $custSzip; ?>">
      </li>
	  <li class="field right">
        <label>State</label>
        <input type="text" name="sstate" value="<?php echo $custSstate; ?>">
      </li>
    </ul>
<br>
	<li>
    <input type="submit" value="update" id="update">
    </li>
  </form></div>
 



</div>
<?php
	include ('footer.php');
?>