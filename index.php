<?php include('include/header.php'); ?>
	<?php include('include/slider.php'); ?>
	<section>
		<div class="container">
			<div class="row">

			<?php include('include/sidebar.php'); ?>	
				
				<div class="col-sm-9 padding-right">
  <!--Pagination-->
        <?php
           $per_page = 3;
           if(isset($_GET["page"])){
           	$page = $_GET["page"];
           }else{
           	$page = 1;
           }
           $start_from = ($page-1) * $per_page;
        ?>
   <!--Pagination-->

<div class="features_items"><!--features_items-->					
	<h2 class="title text-center">Features Items</h2>
          <?php
              $getProduct = $product->getFeatureProduct($start_from,$per_page);
              if ($getProduct) {
              	  while ($data = $getProduct->fetch_assoc()) {
          
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
	<?php } } 
	
	else {
        
        echo "<span style='color:red; font-size:20px;'>There is no item</span>";

		} 
		?>
</div><!--features_items-->
					
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Non Features</h2>

    <?php
      $getProduct = $product->getNonFeatureProduct($start_from,$per_page);
      if ($getProduct) {
      	  while ($data = $getProduct->fetch_assoc()) {
  
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
	<?php } } 
    
    else {
        
        echo "<span style='color:red; font-size:20px;'>There is no item</span>";

		} 

	?>					
</div><!--features_items-->
					
<div class="category-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
			<li><a href="#blazers" data-toggle="tab">Blazers</a></li>
			<li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
			<li><a href="#kids" data-toggle="tab">Kids</a></li>
			<li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
		</ul>
</div>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="tshirt" >
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
			<?php 
			 $query = "SELECT * FROM tbl_product where cat_id = '6' order by id desc limit 4";          
          	  $result = $db->select($query);
              if ($result) {
              	while ($data = $result->fetch_assoc()) {           
            
              ?>
			<div class="productinfo text-center">
				<img src="admin/<?php echo $data['image'];?>" alt="" />
				<h2>$<?php echo $data['price'];?></h2>
				<p><?php echo $data['name'];?></p>
				<a href="details?seeProductId=<?php echo $data['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
			</div>
		<?php } } else {
        
        echo "<span style='color:red; font-size:20px;'>There is no item</span>";

		} ?>	
			
			</div>
		</div>
	</div>			
</div>
							
<div class="tab-pane fade" id="blazers" >
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
			<?php 
			 $query = "SELECT * FROM tbl_product where cat_id = '7' order by id desc limit 4";          
          	  $result = $db->select($query);
              if ($result) {
              	while ($data = $result->fetch_assoc()) {           
            
              ?>
				<div class="productinfo text-center">
					<img src="admin/<?php echo $data['image'];?>" alt="" />
					<h2>$<?php echo $data['price'];?></h2>
					<p><?php echo $data['name'];?></p>
					<a href="details?seeProductId=<?php echo $data['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
				</div>
		<?php } } else {
        
        echo "<span style='color:red; font-size:20px;'>There is no item</span>";

		} ?>
			</div>
		</div>
	</div>
</div>

<div class="tab-pane fade" id="sunglass" >		
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
			<?php 
			 $query = "SELECT * FROM tbl_product where cat_id = '8' order by id desc limit 4";          
          	  $result = $db->select($query);
              if ($result) {
              	while ($data = $result->fetch_assoc()) {           
            
              ?>
				<div class="productinfo text-center">
					<img src="admin/<?php echo $data['image'];?>" alt="" />
					<h2>$<?php echo $data['price'];?></h2>
					<p><?php echo $data['name'];?></p>
					<a href="details?seeProductId=<?php echo $data['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
				</div>
	  <?php } } else {
        
        echo "<span style='color:red; font-size:20px;'>There is no item</span>";

		} ?>			
			</div>
		</div>
	</div>
</div>

<div class="tab-pane fade" id="kids" >
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
			 <?php 
			 $query = "SELECT * FROM tbl_product where cat_id = '1' order by id desc limit 4";          
          	  $result = $db->select($query);
              if ($result) {
              	while ($data = $result->fetch_assoc()) {           
            
              ?>
				<div class="productinfo text-center">
					<img src="admin/<?php echo $data['image'];?>" alt="" />
					<h2>$<?php echo $data['price'];?></h2>
					<p><?php echo $data['name'];?></p>
					<a href="details?seeProductId=<?php echo $data['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
				</div>
		<?php } } else {
        
        echo "<span style='color:red; font-size:20px;'>There is no item</span>";

		} ?>	
			</div>
		</div>
	</div>
</div>


<div class="tab-pane fade" id="poloshirt" >	
		<div class="col-sm-3">
			<div class="product-image-wrapper">
				<div class="single-products">
		<?php 
			 $query = "SELECT * FROM tbl_product where cat_id = '9' order by id desc limit 4";          
          	  $result = $db->select($query);
              if ($result) {
              	while ($data = $result->fetch_assoc()) {           
            
           ?>
				<div class="productinfo text-center">
					<img src="admin/<?php echo $data['image'];?>" alt="" />
					<h2>$<?php echo $data['price'];?></h2>
					<p><?php echo $data['name'];?></p>
					<a href="details?seeProductId=<?php echo $data['id'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>See Details</a>
				</div>
		<?php } } else {
        
        echo "<span style='color:red; font-size:20px;'>There is no item</span>";

		} ?>		
				</div>
			</div>
		</div>
	</div>
</div>
</div><!--/category-tab-->
		<!--Pagination -->
   <?php
     $query  = "SELECT * FROM tbl_product";
     $result = $db->select($query);
     $total_rows = mysqli_num_rows($result);
     $total_page = ceil($total_rows/$per_page);
    
	 echo "<span class='pagination' style='display: block; margin-top: 20px; font-size: 20px; padding: 10px;text-align: center;'><a href='index?page=1' style='border-radious:3px;background:#FE980F;border:1px solid #a7700c; margin-left:2px;padding:2px 10px;text-decoration:none;'>".'First Page'."</a>"; 
	  for ($i=1; $i <=$total_page; $i++){ 
     	echo "<a href='index?page=".$i."'style='border-radious:3px;background:#FE980F;border:1px solid #a7700c; margin-left:2px;padding:2px 10px;text-decoration:none;'>".$i."</a>";
     }
	echo "<a href='index?page=$total_page'style='border-radious:3px;background:#FE980F;border:1px solid #a7700c; margin-left:2px;padding:2px 10px;text-decoration:none;'>".'Last Page'."</a></span>";
	?>
  <!--Pagination -->		

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
	
	<div class="recommended_items"><!--From Our Blog-->
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
	</div><!--From Our Blog-->


</div>
</div>
</div>
</section>

	<?php include('include/footer.php'); ?>