<?php include('include/header.php'); ?>

    <?php
      $login = Session::get("login");
      if ($login == false)
        echo "<script> window.location = 'index'; </script>";                                                      
     ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>

		<?php
			 if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
             $cartid     = $helper->validation($_POST['cartid']);
             $quantity   = $helper->validation($_POST['quantity']);
               $UpdateCartData = $cart->updateCart($quantity,$cartid);
           }
           if (isset($UpdateCartData)) {
            echo $UpdateCartData;
           }
	    ?>

            
      <?php
      //Making Page Autoload
        if (!isset($_GET['id'])) {
        	echo "<meta http-equiv='refresh' content='0;URL=?id=e-shopper'";
        }
      ?>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Product Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
	 <?php
       if (isset($_GET["deleteId"])){
         $deleteId = preg_replace('/[^-a-zA-Z0-9_]/', '',$_GET['deleteId']);
         $query = "DELETE FROM tbl_cart WHERE id = '$deleteId'";
         $data = $db->delete($query);
         }         
        ?>

				<?php 
                  $getCartData = $cart->getYourCartProduct();
                  if ($getCartData) {
                  	$sum = 0;
                  	$count = 0;
                  	while ($data = $getCartData->fetch_assoc()) {
                  
				?>
				<?php 
				 $getData = $cart->checkcartRow();
                     if ($getData) { 

				?>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="admin/<?php echo $data['image']; ?>" alt="" style="width: 40px; height:40px;" ></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $data['product_name']; ?></a></h4>
								<p>Product ID: <?php echo $data['id']; ?></p>
							</td>
							<td class="cart_price">
								<p>$<?php echo $data['price']; ?></p>
							</td>
<td class="cart_quantity">
  <div class="cart_quantity_button">
	<form action="" method="post">
		<input type="hidden" name="cartid" value="<?php echo $data['id']; ?>">
		<input type="number" name="quantity" value="<?php echo $data['quantity']; ?>">
		<input type="submit" name="submit" value="Update">
	</form>
  </div>
</td>
							<td class="cart_total">
								<p class="cart_total_price">$
							<?php $total =  $data['price']*$data['quantity'];
                                echo $total;
								 ?></p>
							</td>
							<td class="cart_delete">
								<a onclick="return confirm('Do you want to delete this cart?');" class="cart_quantity_delete" href="?deleteId=<?php echo $data['id'] ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>					
					</tbody>
					<?php
                        $sum = $sum + $total;
                        $count = $count + $data['quantity'];
                        Session::set("sum",$sum);
                        Session::set("count",$count);
					?>
					<?php } } ?>
				  <?php } else
                      echo "<span style='color:red;'> Plese shop now</span>";
				  ?>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$<?php if (isset($sum)) {
								echo $sum;
							} ?></span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>100</span></li>
							<li>Total <span>$<?php if (isset($sum)) {
								echo $sum+102;
							} else { echo "0"; }?></span></li>
						</ul>
							<a class="btn btn-default check_out" href="checkout">Check Out</a>
							<a class="btn btn-default check_out" href="index">Continue Shopping</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<?php include('include/footer.php'); ?>