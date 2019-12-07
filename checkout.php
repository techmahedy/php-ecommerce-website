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
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->			

			<div class="review-payment">
				<h2>Review & Payment</h2>
			<?php 
		         if (isset($_GET["orderId"]) && $_GET["orderId"] == 'order'){
             	 $id = Session::get("userId");
                 $insertOrder = $cart->orderProduct($id);
             
                    if ($insertOrder)
                    	echo $insertOrder;
                    }
			?>
			</div>

			<div class="table-responsive cart_info">
			

	<section id="cart_items">
		<div class="container">

		<?php
			 if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['insert'])){
    
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
		<input type="submit" name="insert" value="Update">
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
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
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
							<a class="btn btn-default check_out" href="?orderId=order">Order Now</a>
							<a class="btn btn-default check_out" href="index">Continue Shopping</a>
					</div>
				</div>


				<div class="col-sm-6">
					<div class="total_area">
							<section>
           <?php
                $name = Session::get("name");
                $id = Session::get("userId");
                $profile = $user->userProfile($id);
           ?>
<div class="container">
<div class="row">
<div class="col-sm-4"  style="margin-bottom: 200px;">
	<h2>Your Profile <?php echo $name; ?></h2>
	<div class="signup-form"><!--sign up form-->
		
	<?php
	
			 if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
               $updateProfile = $user->updateUserProfile($_POST,$id);
        
           if ($updateProfile)
            echo $updateProfile;
        }
        
    ?>
        <?php
        if ( $profile) {
        while ( $data = $profile->fetch_assoc()) {
      
        ?>
<form action="" method="post">
	<table>	
	Name
	<input type="text" name="name" value="<?php echo $data['name']; ?>" />
	City
	<input type="text" name="city" value="<?php echo $data['city']; ?>"/>
	Zip-Code
	<input type="text" name="zip" value="<?php echo $data['zip']; ?>"/>
	Email
	<input type="email" name="email" value="<?php echo $data['email']; ?>"/>
	Country
<input type="text"  name="country" value="<?php echo $data['country']; ?>"/>
Phone
	<input type="text" name="phone" value="<?php echo $data['phone']; ?>"/>
	Password
<input type="password" name="password" value="<?php echo $data['password']; ?>"/>
	<input type="submit" name="submit" class="btn btn-info" value="Update">
  </table>
</form>
	<?php } }  ?>
	</div><!--/sign up form-->
</div>
</div>
</div>
	</section><!--/form-->
		</div>
	</div><!--/recommended_items-->
	
</div>
</div>
</div>
</section>
<?php include('include/footer.php'); ?>