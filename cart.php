<?php 

include ('header.php');
include ('connect_db.php');

if (isset($_GET['remove'])) {
    
    unset($_SESSION['id'][$_GET['remove']]);
    $_SESSION["id"] = array_values($_SESSION["id"]);
} 
?>

<div class="primary left">
    
    <table class="product-table">
      <tbody><tr>
        <th class="first">Book Title</th>
        <th>Remove?</th>
        <th>Condition</th>
        <th class="right last">Price</th>
      </tr>
	  
	  <?php
	  $total=0;
	  setlocale(LC_MONETARY,"en_US");
	  if(empty($_SESSION['id']))
	  {
		  echo '<th style="float:bottom;background:none;border:none;text-align:center; font-size:20px;color:white"><hr> Your Cart is Empty <hr></th>';
	  }
	  foreach($_SESSION['id'] as $value)
	  {
		  $result = mysqli_query($con,"SELECT * FROM book where ISBN=$value");


              while($row = mysqli_fetch_array($result)){
	?>
              <tr>
          <td class="first">
         <?php   echo '<a class="link" href="bookinfo.php?isbn='.$row['ISBN'].'">'; ?>
              <div class="thumb">

              <div class="short-description">
                <h3 class="title"> <?php echo $row['BookName'] ?></h3>
                                  <p class="author"><span class="label">Author:</span><?php echo $row['Author'] ?></p>
                                <p class="isbn"><span class="label">ISBN:</span><?php echo $row['ISBN'] ?></p>
              </div>
            </a>
          </td>
          <td>
                        <a class="boxclose" href="?remove=<?php echo array_search($row['ISBN'], $_SESSION['id']); ?>">
          </td>
          <td>
                                      <span class="condition"><span class="icon good"></span>Good</span>
                      </td>
          <td class="right last"><span class="price">$<?php echo $row['price'] ?></span></td>
        </tr>
		<?php
		$total=$total+$row['price'];
			  }
	  }
		?>
          </tbody></table>

    <table class="totals-table">
      <tbody>
        <tr>
          <th>Subtotal:</th>
          <td>$<?php echo $total ?></td>
        </tr>
                <tr>
          <!--<th>Discount:</th>
          <td>$0.00</td>
        </tr>-->
      </tbody>
      <tfoot>
        <tr>
          <th>Total:</th>
          <td>$<?php echo $total; ?></td>
        </tr>
      </tfoot>
    </table>

    <p class="checkout-btns"><a class="button dark big" href="index.php">« Continue shopping</a> 
	<?php
$aa = count($_SESSION['id']); 	
	if($aa>0)
	{	
?>
<a class="button big" href="checkout.php">Checkout »</a></p>
  </div>
	
<?php
	}
	include ('footer.php');
?>