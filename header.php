<?php 
	session_start(); 
	if(isset($_GET['suc']))
{
	session_unset();
}

	if (isset($_GET['logout']))
	{
		session_unset();
	}

	if(empty($_SESSION)) {
	
	$_SESSION['id'] = array();
	$_SESSION['cust'] = array();
	$_SESSION['cid'] = array();
	}
	if(isset($_GET['a']))
	{
		$_SESSION['id'][] = $_GET['a'];
	}
	if (isset($_GET['cu']))
	{
		$_SESSION['cust'][] = $_GET['cu'];
		$_SESSION['cid'][] = $_GET['ci'];
	}
?>
<link rel="stylesheet" href="style.css">
<script type="text/javascript">
function validateForm() {
    var x = document.forms["myForm"]["searchbox"].value;
	
    if (x == null || x == "") {
        alert("Please enter a query to proceed");
        return false;
    }
}
</script>
<Title>Salvos Book Store</title>
<body>
<div class=login>
<?php

if (isset($_SESSION['cust']) && (!empty($_SESSION['cust'])))
{
	echo '<a style="float:left" href="profile.php"><p>'.reset($_SESSION['cust']).' (profile)</p></a>';
    echo '<a style="float:right" href="index.php?logout=1"><p>logout</p></a>';
	
}
else{
	echo '<a style="float:left" href="register.php"><p>Login/Register</p></a>';
}
?>
</div>
<header>

<div class="Secondary">
<img id="logo" src="logo.gif" alt="logo">
<h2 id="tagline" style="font-family:"Verdana";> Online Second-hand Book store<h2>

</div>
</header>
<nav>
<ul>
  <li><a href="index.php">Home</a></li>
  <li class="divider-vertical-second-menu"></li>
  <li><a href="category.php">Categories</a></li>
  <li class="divider-vertical-second-menu"></li>
  <li><a href="reco.php">Recommendations</a></li>
  <li class="divider-vertical-second-menu"></li>
  <li><a href="recent.php">Recently Added</a></li>
  <li class="divider-vertical-second-menu"></li>
  <li><a href="top10.php">Top 6</a></li>
  <li class="divider-vertical-second-menu"></li>
  <li><a href="donate.php">Donate</a></li>
  <li class="divider-vertical-second-menu"></li>
  <li><a href="contactus.php">Contact Us</a></li>
   <li class="divider-vertical-second-menu"></li>
  <li ><a class="active" href="aboutus.php">About us</a></li>
  
  
</ul>
</nav>

<div class="searchbox">

<div class="searchdiv">

<form name="myForm" action="search.php" onsubmit="return validateForm()" method="POST" >
  
  <input type="text" name="searchbox" placeholder="Search....">
  
  <label >By</label><select name="searchby">
  <option value="isbn">ISBN</option>
  <option value="Author">Author</option>
  <option value="BookName">Book Name</option>
  
</select>
  <input type="submit" value="Search">
</form>
</div>
<div class="cartdiv">
<a href="cart.php">
<h3>Your Cart(<?php echo count($_SESSION['id']); ?>)</h3><a>
</div>
</div>