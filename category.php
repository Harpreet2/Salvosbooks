<?php 

include ('header.php');
include ('connect_db.php');

?>



<div class="main">
<div class="main2">
<h5 >Categories</h5>
<ul>
 <li>
        <a href="category.php?categories=anthology">Anthology</a>
      </li>
                <li>
        <a href="category.php?categories=australia">Australia</a>
      </li>
                <li>
        <a href="category.php?categories=biographies-and-autobiographies">Biographies &amp; Autobiographies</a>
      </li>
                <li>
        <a href="category.php?categories=body-mind-and-spirit">Body, Mind &amp; Spirit</a>
      </li>
                <li>
        <a href="category.php?categories=business-and-economics">Business, Finance &amp; Economics</a>
      </li>
                <li>
        <a href="category.php?categories=childrens-books">Children's Books</a>
      </li>
                <li>
        <a href="category.php?categories=coffee-table">Coffee Table</a>
      </li>
                <li>
        <a href="category.php?categories=collections">Collections</a>
      </li>
                <li>
        <a href="category.php?categories=comics-graphic-novels-and-manga">Comics, Graphic Novels &amp; Manga</a>
      </li>
                <li>
        <a href="category.php?categories=crafts-and-hobbies">Crafts &amp; Hobbies</a>
      </li>
                <li>
        <a href="category.php?categories=art-design-and-architecture">Creative Arts, Design &amp; Architecture</a>
      </li>
                <li>
        <a href="category.php?categories=education">Education</a>
      </li>
                <li>
        <a href="category.php?categories=family-and-relationships">Family &amp; Relationships</a>
      </li>
                <li>
        <a href="category.php?categories=fiction">Fiction</a>
      </li>
            
                <li>
        <a href="category.php?categories=film-and-television">Film and Television</a>
      </li>
                <li>
        <a href="category.php?categories=food-and-drinks">Food &amp; Drinks</a>
      </li>
                <li>
        <a href="category.php?categories=games-and-puzzles">Games &amp; Puzzles</a>
      </li>
                      <li>
        <a href="category.php?categories=health-and-fitness">Health &amp; Fitness</a>
      </li>
                <li>
        <a href="category.php?categories=history-and-archaeology">History &amamp; Archaeology</a>
      </li>
                <li>
        <a href="category.php?categories=history-american-civil-war">History - American Civil War</a>
      </li>
                <li>
        <a href="category.php?categories=home-and-garden">Home &amp; Garden</a>
      </li>
                <li>
        <a href="category.php?categories=humour">Humour</a>
      </li>
                <li>
        <a href="category.php?categories=journalism">Journalism</a>
      </li>
                <li>
        <a href="category.php?categories=language-and-literature">Language &amp; Literature</a>
      </li>
                <li>
        <a href="category.php?categories=maths-sciences-and-technology">Maths, Sciences &amp; Technology</a>
      </li>
                <li>
        <a href="category.php?categories=military">Military</a>
      </li>
                <li>
        <a href="category.php?categories=music">Music</a>
      </li>
                <li>
        <a href="category.php?categories=nature-and-environment">Nature &amp; Environment</a>
      </li>
                <li>
        <a href="category.php?categories=odds-and-ends">Odds &amp; Ends</a>
      </li>
                <li>
        <a href="category.php?categories=performing-arts">Performing Arts</a>
      </li>
                <li>
        <a href="category.php?categories=pets">Pets</a>
      </li>
                <li>
        <a href="category.php?categories=philosophy">Philosophy</a>
      </li>
                <li>
        <a href="category.php?categories=poetry-and-drama">Poetry &amp; Drama</a>
      </li>
                <li>
        <a href="category.php?categories=psychology">Psychology</a>
      </li>
                <li>
        <a href="category.php?categories=rare-and-collectibles">Rare &amp; Collectibles</a>
      </li>
                <li>
        <a href="category.php?categories=reference">Reference</a>
      </li>
                <li>
        <a href="category.php?categories=religion">Religion</a>
      </li>
                <li>
        <a href="category.php?categories=self-help">Self-help</a>
      </li>
                <li>
        <a href="category.php?categories=social-sciences-and-politics">Social Sciences &amp; Politics</a>
      </li>
                <li>
        <a href="category.php?categories=sports-and-recreation">Sports &amp; Recreation</a>
      </li>
                <li>
        <a href="category.php?categories=transport">Transport</a>
      </li>
                <li>
        <a href="category.php?categories=travel-and-adventure">Travel &amp; Adventure</a>
      </li>
                <li>
        <a href="category.php?categories=true-crime">True Crime</a>
      </li>
                <li>
        <a href="category.php?categories=young-adult-books">Young Adult Books</a>
      </li>
	    <li>
        <a href="category.php?categories=others">Others</a>
      </li>
</ul>
</div>
<div class="main1" style="width:80%">
<?php

$categories="";
if(!isset($_GET['categories']))
{
	echo '<h5 style="color:white"> Please select a category</h5>';

}
else
{
	$categories= $_GET['categories'];
	$categories = ucfirst($categories);
	$category = $categories;

echo '<h5 style="color:white"> Category: '.$categories.'</h5>';
}
?>
<ul>
<?php
$categories = "'".$categories."'";

$per_page = 9;
$res = mysqli_query($con,"SELECT * FROM book where booktype=$categories");
$total_results = $res->num_rows;

$total_pages = ceil($total_results / $per_page);

if(!isset($_GET['page']))
{
	$page =1;

}
else
{
	$page= $_GET['page'];
	
}

$start=($page-1)*$per_page;
$result = mysqli_query($con,"SELECT * FROM book where booktype=$categories limit $per_page offset $start");


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
	?> <ul><li class="current"><a href="category.php?page=<?php echo $b; ?>&categories=<?php echo $category ?>" style="text-decoration:none"><?php echo $b." "; ?></a></li></ul> <?php
}
echo '</div></div>';
}

?>

<?php
	include ('footer.php');
?>