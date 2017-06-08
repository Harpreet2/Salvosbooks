<?php 

include ('header.php');
include ('connect_db.php');

?>



<div class="main" style="min-height:400px">
<div class="main1">
 
<ul>
<?php

if(!isset($_GET['page']))
{
	$searchby = $_POST["searchby"];
    $searchbox = $_POST["searchbox"];
    $searchterm = $searchbox;
	$page =1;

}
else
{
	$searchby = $_GET['searchby'];
    $searchbox = $_GET['searchbox'];
    $searchterm = $searchbox;
	$page= $_GET['page'];
	
}



$searchbox = "'".$searchbox."'";
$per_page = 9;
$res = mysqli_query($con,"SELECT * FROM book where $searchby=$searchbox");
$total_results = $res->num_rows;
$total_pages = ceil($total_results / $per_page);

if (!$total_results>0)
{
	echo '<h2 style="color:white;font-family:georgia"> Sorry. No books found.</h2>';
}
else{
echo '<h2 style="color:white;font-family:georgia"> Search results for '.$searchbox.':</h2>';
}
	
$start=($page-1)*$per_page;
$result = mysqli_query($con,"SELECT * FROM book where $searchby=$searchbox limit $per_page offset $start");


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
if($total_results>$per_page)
{
echo '<div><div class="pagin">';
for($b=1;$b<=$total_pages;$b++)
{
	?> <ul><li class="current"><a href="search.php?page=<?php echo $b; ?>&searchbox=<?php echo $searchterm ?>&searchby=<?php echo $searchby ?>" style="text-decoration:none"><?php echo $b." "; ?></a></li></ul> <?php
}
echo '</div></div>';
}

?>
<?php
	include ('footer.php');
?>