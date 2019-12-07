<?php include('classes/category.php'); ?>
<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						
					<?php
					      $cat = new Category();
                          $category = $cat->getCategoryName();
                          if($category){
                          	while ( $data = $category->fetch_assoc()) {
                      
					?>
	
							<div class="panel panel-default">
								<div class="panel-heading">
<h4 class="panel-title"><a href="categoryproduct?cat_id=<?php echo $data['id']; ?>"><?php echo $data['cat_name']; ?></a></h4>
			                  </div>
							</div>
							<?php } } ?>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
					
							<div class="brands-name">
					<?php
					      $cat = new Category();
                          $brand = $cat->getBrandsName();
                          if($brand){
                          	while ( $data = $brand->fetch_assoc()) {
                      
					?>
								<ul class="nav nav-pills nav-stacked">
									<li><a href="brandproduct?brand_id=<?php echo $data['id']; ?>""><?php echo $data['brand_name']; ?></a></li>
								</ul>
						<?php } } ?>
						</div>
					</div><!--/brands_products-->
						
<div class="shipping text-center"><!--shipping-->
					<img src="images/home/shipping.jpg" alt="" />
				</div><!--/shipping-->
					
					</div>
				</div>