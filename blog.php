	<?php include('include/header.php'); ?>
	<section>
		<div class="container">
			<div class="row">
				
				<?php include('include/sidebar.php'); ?>

				<div class="col-sm-9">
					<div class="blog-post-area">
	<!--Pagination-->
        <?php
           $per_page = 5;
           if(isset($_GET["page"])){
           	$page = $_GET["page"];
           }else{
           	$page = 1;
           }
           $start_from = ($page-1) * $per_page;
        ?>
   <!--Pagination-->


					<h2 class="title text-center">Latest From our Blog</h2>
					 <?php
					 $data = $blog->getBlogData($start_from,$per_page);
					 if ($data) {
					 	while ($result = $data->fetch_assoc()) {
					 
					 ?>
						<div class="single-blog-post">
							<h3><?php echo $result['name']; ?></h3>
							<div class="post-meta">
	<ul>
		<li>Category : <?php echo $result['cat_name']; ?></li>
	<li>Brand : <?php echo $result['brand_name']; ?></li>
		<li><i class="fa fa-clock-o"></i><?php echo $helper->formatDate($result['date']); ?></li>
	</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="admin/<?php echo $result['image']; ?>" alt="" style="height: 300px;">
							</a>
							<p><?php echo $helper->textShorten($result['body'],250); ?></p>
							<a  class="btn btn-primary" href="blogpost?blogId=<?php echo $result['id']; ?>">Read More</a>
						</div>
                  <?php } ?> <!--End while loop -->
						
						
						<div class="pagination-area">
							        <!--Pagination -->
   <?php
     $query  = "SELECT * FROM tbl_blog";
     $result = $db->select($query);
     $total_rows = mysqli_num_rows($result);
     $total_page = ceil($total_rows/$per_page);
    
	 echo "<span class='pagination' style='display: block; margin-top: 20px; font-size: 20px; padding: 10px;text-align: center;'><a href='blog?page=1' style='border-radious:3px;background:#FE980F;border:1px solid #a7700c; margin-left:2px;padding:2px 10px;text-decoration:none;'>".'First Page'."</a>"; 
	  for ($i=1; $i <=$total_page; $i++){ 
     	echo "<a href='blog?page=".$i."'style='border-radious:3px;background:#FE980F;border:1px solid #a7700c; margin-left:2px;padding:2px 10px;text-decoration:none;'>".$i."</a>";
     }
	echo "<a href='blog?page=$total_page'style='border-radious:3px;background:#FE980F;border:1px solid #a7700c; margin-left:2px;padding:2px 10px;text-decoration:none;'>".'Last Page'."</a></span>";
	?>
         <!--Pagination -->

			<?php } else  header("Location:404.php")?>	
         
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php include('include/footer.php'); ?>