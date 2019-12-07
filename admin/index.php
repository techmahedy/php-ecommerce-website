<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>  

      <div class="content-wrapper">
        <section class="content-header">
          <h1 style="font-family: impact;">
            Website Overview
          </h1>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
              <?php
             $query  = "SELECT * FROM tbl_contact";
              $result = $db->select($query);
              if ($result) {
                $i=0;
                while ($data = $result->fetch_assoc()) {  
                $i++; 
                } 
              }         
             ?>
                <div class="inner">
                  <h3><?php if (isset($i)) {
                   echo $i;
                  } else { echo "0"; } ?></h3>
                  <p>Messages</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="inbox.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>    
            </div>
             
             <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
              <?php
             $query  = "SELECT * FROM tbl_admin";
              $result = $db->select($query);
              if ($result) {
                $j=0;
                while ($data = $result->fetch_assoc()) {  
                $j++; 
                } 
              }         
             ?>
                <div class="inner">
                  <h3><?php if (isset($j)) {
                   echo $j;
                  } else { echo "0"; } ?></h3>
                  <p>User</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="userlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>    
            </div>
             
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
              <?php
              error_reporting(0);
              $query  = "SELECT * FROM tbl_order";
              $result = $db->select($query);
              $count = mysqli_num_rows($result);  
             ?>
                <div class="inner">
                  <h3><?php if (isset($count)) {
                   echo $count;
                  } else { echo "0"; } ?></h3>
                  <p>Order</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="orderlist.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>    
            </div>
             
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
             <?php
             $query  = "SELECT * FROM tbl_product_comment";
              $result = $db->select($query);
              if ($result) {
                $a=0;
                while ($data = $result->fetch_assoc()) {  
                $a++; 
                } 
              }         
             ?>
                <div class="inner">
                  <h3><?php if (isset($a)) {
                   echo $a;
                  } else { echo "0"; } ?></h3>
                  <p>Product Feedbak</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="comment.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>    
            </div>
          
            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
             <?php
             $query  = "SELECT * FROM tbl_comment";
              $result = $db->select($query);
              if ($result) {
                $t=0;
                while ($data = $result->fetch_assoc()) {  
                $t++; 
                } 
              }         
             ?>
                <div class="inner">
                  <h3><?php if (isset($t)) {
                   echo $t;
                  } else { echo "0"; } ?></h3>
                  <p>Blog Product Feedbak</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="blogcommnet.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>    
            </div>

          </div>
        </section>
      </div>
    </div>

  <?php include('include/footer.php'); ?>  