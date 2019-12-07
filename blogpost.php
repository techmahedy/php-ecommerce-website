<?php include('include/header.php'); ?>
	<section>
		<div class="container">
			<div class="row">

			<?php include('include/sidebar.php'); ?>
            
        <?php                
           if (isset($_GET["blogId"])){
            $blogId = preg_replace('/[^-a-zA-Z0-9_]/', '',$_GET['blogId']);
              }
          else{
              	echo "<script> window.location = '404'; </script>";
              }      
        ?>
				
				<div class="col-sm-9">
					<div class="blog-post-area">
		<?php 
              $query = "select * from tbl_blog";       
                $data = $db->select($query);
                  $value = mysqli_num_rows($data);
                if ($blogId > $value) {          
		?>
	<h2 class="title text-center">You already pass the last page</h2>
		<?php } else { ?>
			<h2 class="title text-center">Latest From our Blog</h2>
		<?php } ?>
		<?php 
            $query = "select p.* , c.cat_name , b.brand_name
                from tbl_blog as p , tbl_category as c , tbl_brand as b 
                where p.cat_id = c.id and p.brand_id = b.id and 
                p.id = '$blogId'";       
              $data = $db->select($query);
              if ($data) {
              	while ($result = $data->fetch_assoc()) {
			 	    
		?>
						<div class="single-blog-post">
						
							<h3><?php echo $result['name']; ?></h3>
							<div class="post-meta">
<ul>
	<li>Category : <?php echo $result['cat_name']; ?></li>
	<li>Brand : <?php echo $result['brand_name']; ?></li>
	<li><?php echo $result['date']; ?></li>
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
							<p>
								<li> <?php echo $result['body']; ?></li>
							</p> 	
						</div>
						<?php  } } ?>
					</div><!--/blog-post-area-->


					<div class="socials-share">
						<a href=""><img src="images/blog/socials.png" alt=""></a>
					</div><!--/socials-share-->

					<div class="media commnets">
						<a class="pull-left" href="#" class="fa fa-user">
						</a>
						<div class="media-body">
				<?php 
               $Commnet = $blog->getBlogPostComment($blogId);
                     if ($Commnet) {
                    while ($data = $Commnet->fetch_assoc()) {
                
				?>
							<h4 class="media-heading"><?php echo $data['name']; ?></h4>
							<p><?php echo $data['body']; ?></p>
							<p class="pull-right"><?php echo $helper->formatDate($data['date']); ?></p>
					<?php } } 	?>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
			
 <a class="btn btn-primary" href="blogpost?blogId=<?php 

 echo $blogId+1;
   
 ?>">Next Post</a>
							</div>
						</div>
					</div><!--Comments-->
			
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-4">
<h2>Leave a replay</h2>
<?php
    //Post Commneting System
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment'])) {
   	$blogCommnet = $blog->blogPostComment($_POST,$blogId);
   	if ($blogCommnet) {
   	echo $blogCommnet;
   }
}
?>
<form method="post">
	<div class="blank-arrow">
		<label>Your Name</label>
	</div>
	<span>*</span>
	<input type="text" placeholder="write your name..." name="name">
	<div class="blank-arrow" >
		<label>Email Address</label>
	</div>
	<input type="email" placeholder="write your email..." name="email">
		<label>Your Message</label>
	</div>
	<span>*</span>
	<textarea name="body" rows="11"></textarea>
	<input type="submit" name="comment" class="btn btn-primary" value="Commnet" >
</form>
							</div>
						
					</div><!--/Repaly Box-->
				</div>	
			</div>
		</div>
	</section>
	
	<?php include('include/footer.php'); ?>