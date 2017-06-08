<?php
include ('connect_db.php');
	if(isset($_POST["email_login"]))
	{
		$email_login = "'".$_POST["email_login"]."'";
		$cust="";
	
		$emaildb="";
		$passdb="";
		$password_login = "'".$_POST["password_login"]."'";
		
		$result = mysqli_query($con,"SELECT * FROM customer where email=$email_login && password=$password_login");
		while($row = mysqli_fetch_array($result)){
		$emaildb = $row['email'];
		$passdb = $row['password'];
		$cust = $row['CustomerName'];
		$cid = $row['CustomerID'];
	
		}
			
		$email_login = $_POST["email_login"];	
		$password_login = $_POST["password_login"];
		
		if (($email_login == $emaildb) && ($password_login == $passdb))
		{
		
		 Header("refresh:0;url=profile.php?cu=$cust&ci=$cid");
		}
		else
		{
		Header("refresh:0;url=register.php?login=1");
		}
	}
	?>