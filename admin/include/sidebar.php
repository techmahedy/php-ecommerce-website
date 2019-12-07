 <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
         <div class="user-panel">
    <?php   
    $userId = Session::get('userId');
    ?>
         <?php
                 $query  = "SELECT * FROM tbl_admin where id = '$userId'";
              $result = $db->select($query);
              if ($result) {
                while ($data = $result->fetch_assoc()) {
              
               ?>
            <div class="pull-left image">
              <img src="<?php  echo $data['image']; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php  echo $data['name']; ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
            <?php } } ?>
          </div>

          <!-- search form -->
          <form action="search.php" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='submit' id='search-btn' class="btn btn-flat" style="margin-top: 5px;"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>        
          <!-- /.search form -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

            <li class="active treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Product</span>
           <?php
                 $query  = "SELECT * FROM tbl_product";
              $result = $db->select($query);
              if ($result) {
                $i=0;
                while ($data = $result->fetch_assoc()) {
                 $i++;
                  } 
                }
           ?>
                <span class="label label-primary pull-right"><?php 
                if (isset($i)) {
                  echo $i;
                 } ?></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="addproduct.php"><i class="fa fa-circle-o"></i> Add Product</a></li>
                <li><a href="productlist.php"><i class="fa fa-circle-o"></i> Product List</a></li>
              </ul>
            </li>
             

              <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Category</span>
              <?php
                 $query  = "SELECT * FROM tbl_category";
                  $result = $db->select($query);
                   if ($result) {
                    $j=0;
                    while ($data = $result->fetch_assoc()) {
                   $j++;
                  } 
                }
               ?>
                <span class="label label-primary pull-right"><?php 
                if (isset($j)) {
                  echo $j;
                 } ?></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="add_cat.php"><i class="fa fa-circle-o"></i> Add Category</a></li>
                <li><a href="cat_list.php"><i class="fa fa-circle-o"></i> Category List</a></li>
              </ul>
            </li>

             <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Brands</span>
                 <?php
                 $query  = "SELECT * FROM tbl_brand";
                  $result = $db->select($query);
                   if ($result) {
                    $k=0;
                    while ($data = $result->fetch_assoc()) {
                   $k++;
                  } 
                }
               ?>
                <span class="label label-primary pull-right"><?php 
                if (isset($k)) {
                  echo $k;
                 } ?></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="addbrand.php"><i class="fa fa-circle-o"></i> Add Brand</a></li>
                <li><a href="brandlist.php"><i class="fa fa-circle-o"></i> Brand List</a></li>
              </ul>
            </li>


             <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Order</span>
            <?php
                 $query  = "SELECT * FROM tbl_order";
                  $result = $db->select($query);
                   if ($result) {
                    $m=0;
                    while ($data = $result->fetch_assoc()) {
                   $m++;
                  } 
                }
             ?>
                <span class="label label-primary pull-right"><?php 
                if (isset($m)) {
                  echo $m;
                 } else { echo "0"; } ?></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="orderlist.php"><i class="fa fa-circle-o"></i> Order List</a></li>
              </ul>
            </li>

            
             <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i>
                <span>Blog</span>
            <?php
                 $query  = "SELECT * FROM tbl_blog";
                  $result = $db->select($query);
                   if ($result) {
                    $n=0;
                    while ($data = $result->fetch_assoc()) {
                   $n++;
                  } 
                }
             ?>
                <span class="label label-primary pull-right"><?php 
                if (isset($n)) {
                  echo $n;
                 } else { echo "0"; } ?></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="blogpost.php"><i class="fa fa-circle-o"></i> Add Blogpost</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Social Icon</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="icon.php"><i class="fa fa-circle-o"></i>Update Social Icon</a></li>             
              </ul>
            </li>
             
            <li class="treeview">
              <a href="#">
                <i class="fa fa-envelope"></i> <span>Mail</span>
               <?php
                 $query  = "SELECT * FROM tbl_contact where flag='0'";
                   $result = $db->select($query);
                   if ($result) {
                     $o=0;
                    while ($data = $result->fetch_assoc()) {
                   $o++;
                  } 
                }
               ?>
                <span class="label label-primary pull-right"><?php 
                if (isset($o)) {
                  echo $o;
                 } else { echo "0"; } ?></span>
              </a>
              <ul class="treeview-menu">
                <li><a href="inbox.php">
                  <i class="fa fa-envelope"></i> <span>Mail box</span>
              <?php
                 $query  = "SELECT * FROM tbl_contact";
                 $result = $db->select($query);
                  if ($result) {
                   $p=0;
                    while ($data = $result->fetch_assoc()) {
                   $p++;
                  } 
                }
               ?>
                  <small class="label label-primary pull-right"><?php 
                if (isset($p)) {
                  echo $p;
                 } else { echo "0"; } ?></small>
                </a></li>             
              </ul>
            </li>

           
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>User</span>
                <?php
               $query  = "SELECT * FROM tbl_admin";
                 $result = $db->select($query);
                  if ($result) {
                   $q=0;
                    while ($data = $result->fetch_assoc()) {
                   $q++;
                  } 
                }
               ?>
                <i class=""></i>
                 <small class="label label-primary pull-right"><?php 
                if (isset($q)) {
                  echo $q;
                 } else { echo "0"; } ?></small>
              </a>
               <ul class="treeview-menu">
                <?php 
                 if(Session::get('level') == '0') { ?>
                 <li><a href="adduser.php"><i class="fa fa-circle-o"></i>Add User</a></li> 
                <?php } ?>

                <li><a href="user_profile.php"><i class="fa fa-circle-o"></i>User Profile</a></li> 
                 <li><a href="userlist.php"><i class="fa fa-circle-o"></i>User List</a></li> 
                <li><a href="update_pass.php"><i class="fa fa-circle-o"></i>Change Password</a></li>         
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Copy Right</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="copyright.php"><i class="fa fa-circle-o"></i>Update Copyright</a></li>                    
              </ul>
            </li>
          
             <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Address</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="address.php"><i class="fa fa-circle-o"></i>Update Address</a></li>                    
              </ul>
            </li>
             
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Feedback</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="comment.php"><i class="fa fa-circle-o"></i>Product</a></li>                    
              </ul>
              <ul class="treeview-menu">
                <li><a href="blogcommnet.php"><i class="fa fa-circle-o"></i>Blog</a></li>                    
              </ul>
            </li>
           
            <li class="header">www.eshopper.com</li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>