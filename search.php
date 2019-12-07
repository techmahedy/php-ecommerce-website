<?php include('include/header.php'); ?>
	<section>
		<div class="container">
			<div class="row">

			<?php include('include/sidebar.php'); ?>	
				
				<div class="col-sm-9 padding-right">
<?php
 if (!isset($_GET['search']) || $_GET['search'] == NULL ){
  echo "<script> window.location = '404'; </script>";
 }
 else{
  $search = $_GET['search'];
  }
 ?>
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Your Search Product</h2>

    <?php
		 $query = "SELECT * from tbl_product where name LIKE '%$search%' OR body LIKE '%$search%'";
  $post = $db->select($query);
  if ($post){
    while ($result = $post->fetch_assoc()) {              
          
	?>
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
					<div class="productinfo text-center">
					<img src="admin/<?php echo $result['image'];?>" alt="" />
						<h2>$<?php echo $result['price'];?></h2>
						<p><?php echo $result['name'];?></p>
						<a href="details?seeProductId=<?php echo $result['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
						<a href="details?seeProductId=<?php echo $result['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
					</div>
			</div>
		</div>
	</div>
	<?php } } else { echo "<script> window.location = '404.php'; </script>"; } ?>					
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


<div class="recommended_items"><!--recommended_items-->
		<h2 class="title text-center">From Our Blog</h2>					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
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