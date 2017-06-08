<?php 

include ('header.php');
include ('connect_db.php');
if(isset($_GET['suc']))
{
	session_unset();
}
?>



<div class="main">
<div class="main1" style="width:80%">
<ul>
<?php

$result = mysqli_query($con,"SELECT * FROM book ORDER BY rand() 
   LIMIT 9");


while($row = mysqli_fetch_array($result)){
	 echo '<li class="product">';
   echo '<a class="link" href="bookinfo.php?isbn='.$row['ISBN'].'">';
        echo '<div class="cover align-bottom" style="height: 190px;">
          <div class="overlay">
            <img src="' . $row['imagepath'] . '.jpg" alt="'.$row['BookName'].'"/>
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
          </div>
        </div>';
		echo '<div class="details" style="height: auto;">
          <h4 class="title">' . $row['BookName'] . '</h4>
             <p class="author"><span class="label">Author:</span> ' .$row['Author'] . '</p>
                        <p class="isbn"><span class="label">ISBN:</span>' . $row['ISBN'] . '</p>
                  </div>';
				  echo ' <div class="add">
          <p class="price">
          	              From $' . $row['price'] . '                      </p>
          <span class="button">More info</span>
        </div>';
	echo '</a></li>';
	
}


mysqli_close($con);

?>
</ul>
</div>
<div class="main2">
<h2>Welcome</h2>
<br>
<p style="color:white;margin-right:10px"> Welcome to Salvos Book store. You can find second hand books at cheap prices in here.</p>
</div>
</div>

<?php
	include ('footer.php');
?>