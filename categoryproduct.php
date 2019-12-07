<?php include('include/header.php'); ?>
	
	<section>
		<div class="container">
			<div class="row">

			<?php include('include/sidebar.php'); ?>	
				
				<div class="col-sm-9 padding-right">
 

<div class="features_items"><!--features_items-->					
	<h2 class="title text-center">Features Items</h2>
          <?php
           if (isset($_GET["cat_id"])){
            $cat_id = preg_replace('/[^-a-zA-Z0-9_]/', '',$_GET['cat_id']);
              }
           else{
              	echo "<script> window.location = '404'; </script>";
              }       

           $query = "SELECT * FROM tbl_product where cat_id='$cat_id' and type='0'";
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
						<a href="details?seeProductId=<?php echo $data['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
						<a href="details?seeProductId=<?php echo $data['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
			
					</div>			
			</div>
		</div>
	</div>
	<?php } } else echo "<span style='color:red;'> Sorry, there are no product such type of category or brand </span>" ?>
</div><!--features_items-->
					
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Non Features</h2>

     <?php
           if (isset($_GET["cat_id"])){
            $cat_id = preg_replace('/[^-a-zA-Z0-9_]/', '',$_GET['cat_id']);
              }      

           $query = "SELECT * FROM tbl_product where cat_id='$cat_id' and type='1'";
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
						<a href="details?seeProductId=<?php echo $data['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
						<a href="details?seeProductId=<?php echo $data['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
					</div>
			</div>
		</div>
	</div>
	<?php } } else echo "<span style='color:red;'> Sorry, there are no product such type of category or brand </span>" ?>					
</div><!--features_items-->
					

				

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