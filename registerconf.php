<?php 

include ('header.php');
include ('connect_db.php');



if(!empty($_POST))
{
	$email= "'".$_POST["email"]."'";
	$name = "'".$_POST["name"]."'";
	$password = "'".$_POST["password"]."'";
	$password_confirm = $_POST["password_confirm"];
	
	$result = mysqli_query($con,"SELECT * FROM customer where email=$email");
   $email_results =  mysqli_num_rows($result);
  
    if($email_results == 0)
	{
		$sql = "INSERT INTO Customer (CustomerName, email, password)
VALUES ($name, $email, $password)";
$_POST = array();
if ($con->query($sql) === TRUE) {
    
		?>
		<div class="main" style="min-height:400px">
		<h2 style="color:white"> Registration successful. Now you will be redirected to login page</h2>
		</div>
		<?php
		 Header("refresh:10;url=register.php");
}
 else {
	 ?>
	 <div class="main" style="min-height:400px">
		<h2 style="color:white"> Registration not successful. Connection error. Try again(you will be redirected to registration page)<?php echo "Error: " . $sql . "<br>" . $con->error; ?> </h2>
		</div>
		<?php
     Header("refresh:10;url=register.php");
}
		 }
		 if($email_results > 0)
		 {
			 Header("refresh:0;url=register.php?email1=1");
		 }
}


	include ('footer.php');
?>