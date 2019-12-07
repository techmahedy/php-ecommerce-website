<?php include('include/header.php'); ?>
	
	<section>
		<div class="container">
			<div class="row">

				<?php include('include/sidebar.php'); ?>
				
	   <?php                
           if (isset($_GET["seeProductId"])){
            $seeProductId = preg_replace('/[^-a-zA-Z0-9_]/', '',$_GET['seeProductId']);
              }else{
              	echo "<script> window.location = '404'; </script>";
              }      
            $getProduct = $product->getSingleProductDetail($seeProductId);
			 if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cart'])){
	          $quantity = $_POST['quantity'];
	         $addToCart = $cart->addToCartOperation($quantity,$seeProductId);
	         }         
        ?>
				<div class="col-sm-9 padding-right">
					<?php
                      if ($getProduct) {
                      	while ($data = $getProduct->fetch_assoc()) {
                      
					?>
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="admin/<?php echo $data['image'];?>" alt="" />
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
		   <?php
				if (isset($addToCart)) {
					echo $addToCart;
			   }
			?>		
								<h2><?php echo $data['name'];?></h2>
								<p>Product ID:<?php echo $data['id'];?></p>							
								<strong style="font-size: 20px;">US $<?php echo $data['price'];?></strong> <br>
	<span>
<form action="" method="post">
	<label>Quantity:</label>
	<input type="Number" name="quantity" value="1" />
	<?php
      $login = Session::get("login");
      if ($login == false){
      	?>
          <a class="btn btn-fefault cart" href="login">
			Please login to cart this product
		 </a>              
      <?php } else {?>
		<button type="submit" class="btn btn-fefault cart" name="cart">
			<i class="fa fa-shopping-cart"></i>
			Add to cart	
		</button>
		<?php } ?>
</form>
	</span>							</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Category:</b> <?php echo $data['cat_name'];?></p>
								<p><b>Brand:</b><?php echo $data['brand_name'];?></p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

			<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Details</a></li>						
								<li><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
                         	<div>
								<?php echo $data['body'];?>
							</div>
                 	   </div>
							
						
					
							
      <div class="tab-pane fade" id="reviews" >
			<div class="col-sm-12">
		<?php 
               $getCommnet = $blog->getProductComment($seeProductId);
                     if ($getCommnet) {
                    while ($data = $getCommnet->fetch_assoc()) {
                
		?>

<ul>
	<li><a href=""><i class="fa fa-user"></i><?php echo $data['name']; ?></a></li>
	<li><a href=""><i class="fa fa-clock-o"></i><?php echo $helper->formatDate($data['date']); ?></a></li>
</ul>
				<p><?php echo $data['body']; ?></p>

		<?php } } 	?>

				<p><b>Write Your Review</b></p>
<?php
    //Post Commneting System
    if (isset($_POST['submit'])){
   	$productCommnet = $blog->productFeedback($_POST,$seeProductId);
   	if ($productCommnet) {
   	echo $productCommnet;
   }
}
?>
<form action="#" method="post">
<span>
	<input type="text" placeholder="Your Name" name="name" />
	<input type="email" placeholder="Email Address" name="email" />
</span>
<textarea name="body" ></textarea>
<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
<input type="submit" class="btn btn-default pull-right" value="Submit" name="submit">
</form>
	
			</div>
		</div>
		<?php } } ?>
	</div>
</div><!--/category-tab-->
					
	<div class="recommended_items"><!--recommended_items-->
		<h2 class="title text-center">recommended items</h2>					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="item active">						
		 <?php 
			 $query = "SELECT * FROM tbl_product order by rand() desc limit 3";          
          	  $result = $db->select($query);
              if ($result) {
              	while ($data = $result->fetch_assoc()) {           
            
           ?>
		<div class="col-sm-4">
			<div class="product-image-wrapper">
		 
			<div class="single-products">				
				<div class="productinfo text-center">
					<img src="admin/<?php echo $data['image'];?>" alt="" />
					<h2>$<?php echo $data['price'];?></h2>
					<p><?php echo $data['name'];?></p>
					<a href="details?seeProductId=<?php echo $data['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
				</div>					
			  </div>		
			</div>
		</div>
		<?php } } ?>	
	</div>
<div class="item">	
	
         <?php 
			 $query = "SELECT * FROM tbl_product order by rand() desc limit 3";          
          	  $result = $db->select($query);
              if ($result) {
              	while ($data = $result->fetch_assoc()) {           
            
           ?>
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img src="admin/<?php echo $data['image'];?>" alt="" />
					<h2>$<?php echo $data['price'];?></h2>
					<p><?php echo $data['name'];?></p>
					<a href="details?seeProductId=<?php echo $data['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
				</div>		
				
			</div>
		</div>
	</div>
	<?php } } ?>	
</div>
</div>
			 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			  </a>
			  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
				<i class="fa fa-angle-right"></i>
			  </a>			
		</div>
	</div><!--/recommended_items-->
	
					
				</div>
			</div>
		</div>
	</section>
<?php include('include/footer.php'); ?>