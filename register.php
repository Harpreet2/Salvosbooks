<?php 

include ('header.php');
include ('connect_db.php');



?>
<div class="main" style="min-height:400px">
<div class="main1" style="width:100%">
<?php
if(isset($_GET['ss']))
{
	echo '<p style="margin-left:100px"> please login or register first </p>';
}
?>
 <div class="secondary1">
  <h1 class="heading">Login</h1>
  <form enctype="multipart/form-data"  action="loginconf.php" method="post">

   
    <p>Login using your existing email address and password.</p>
    
    <ul class="form">
	 <?php if(isset($_GET['login'])) 
	   { ?>
	   <li style="color:red"> "Wrong email or password"
	   </li>	   <?php } ?>
      <li class="field inline-label">
        <label for="login_email">Email*</label>
        <input type="text" name="email_login" id="login_email" value="">
      </li>
      <li class="field inline-label">
        <label for="login_password">Password*</label>
        <input type="password" name="password_login" id="login_password">
      </li>
    </ul>
    
    <p>
      <input type="submit" class="button" value="Login">
      <a class="forgotpass" href="/password-restore">Forgot your password?</a>
    </p>
    
    <input type="hidden" name="redirect" value="/profile">
    
  </form></div>
  <div class="primary1">
  <script type="text/javascript">
 
function validateregisterForm() {
    var x = document.forms["register"]["name"].value;
	var y = document.forms["register"]["email"].value;
	var a = document.forms["register"]["password"].value;
	var b = document.forms["register"]["password_confirm"].value;
    if (x == null || x == "" || y == null || y == "" || a == null || a == "" || b == null || b == "") {
        alert("Please complete all fields");
    return false;
    }
	else if(a!=b) {
		alert("Password does not match");
    return false;
	}
  }
</script>
  <h1 class="heading">Register</h1>
  <form name="register" onsubmit="return validateregisterForm()" action="registerconf.php" method="POST">


    <p>To register for an account please specify your name, email address and password then click register.</p>
    
    <ul class="form">
       <?php if(isset($_GET['email1'])) 
	   { ?>
	   <li style="color:red"> "Email already exists"
	   </li>	   <?php } ?>
      <li class="field right">
        <label for="last_name">Name*</label>
        <input type="text" name="name" id="last_name">
      </li>
      <li class="field">
        <label for="signup_email">Email*</label>
        <input type="text" name="email" id="signup_email">
      </li>
      <li class="field left">
        <label for="signup_password">Password*</label>
        <input type="password" name="password" id="signup_password">
      </li>
      <li class="field right">
        <label for="signup_password_confirm">Confirm Password*</label>
        <input type="password" name="password_confirm" id="signup_password_confirm">
      </li>
    </ul>
    
    <input type="submit" value="Register">
    
  </form></div>
 
 </div>
</div>
<?php

	include ('footer.php');
?>