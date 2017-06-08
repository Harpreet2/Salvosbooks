<?php 

include ('header.php');
include ('connect_db.php');

?>



<div class="main" style="min-height:400px">
<div class="main1">
 
<ul>
<h2 style="color:white;font-family:georgia;text-align:center"> Recently Added</h2>
<br>
<?php
$cat='Australia';
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
</div>
<?php
	include ('footer.php');
?>