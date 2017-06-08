<?php 

include ('header.php');
include ('connect_db.php');

?>
<hr style="height:5px;color:white;background-color:white">

<div class="mainb">
<div class="inner">

<div id="product-page">
      
<div class="product-details">
  <div class="primary">
  <?php
  
  $isbn =isset($_GET['isbn']) ? $_GET['isbn'] : null;
$result = mysqli_query($con,"SELECT * FROM book where isbn=$isbn");
if (!$isbn=="")
{
while($row = mysqli_fetch_array($result)){
   echo '<h1 class="heading">'.$row['BookName'].'</h1>';
                  echo '<p class="author"><span class="label">by</span> '.$row['Author'].'</p>';
           echo '<p class="isbn"><span class="label">ISBN:</span> '.$row['ISBN'].'</p>';
   
    echo '<div class="description">'.$row['Description'].'
          </div>';


			?>
<table class="grouped-products">
  <tbody><tr>
    
    <th>Price</th>
    <th class="last"></th>
  </tr>
            <tr>
        
        <?php echo '<td style="text-align:left">$'.$row['price'].'</td>'; ?>
        <td class="last">
                  <?php  echo '<a class="button" href="?a='.$row['ISBN'].'&isbn='.$isbn.'">Add to cart</a>'; ?>
        </td>
      </tr>
      </tbody></table>            </div> <!-- .primary -->

  <div class="secondary">
        <div class="overlay large">
     <?php 
	 echo '<img src="'.$row['imagepath'].'.jpg" alt="'.$row['BookName'].'">'; ?>
	  
      <span class="top"></span>
      <span class="middle"></span>
      <span class="bottom"></span>
    </div>
  </div> <!-- .secondary -->
</div>
<?php
}
}
?>
    </div>
</div>
</div>
<hr style="height:5px;color:white;background-color:white">


<?php
	include ('footer.php');
?>