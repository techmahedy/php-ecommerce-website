<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>  

      <div class="content-wrapper">
        <section class="content">
          <div class="row">
         <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Order List</h3>
              </div>

         <?php
            if (isset($_GET["shiftid"])){
           $id = $_GET['shiftid'];
           $date = $_GET['date'];
           $price = $_GET['price'];
           
            $query = "Update 
                      tbl_order
                      set 
                      status = '1'         
                      where session_id = '$id'
                      and 
                      date = '$date' 
                      and 
                      price = '$price'";
              $update = $db->update($query);        
              if ($update){
                 echo "<span style='color:green; font-size:18px;'>Product has been shifted</span>";
                }
              else{
                echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
              }
            }
       ?>


            <?php 
         
              if (isset($_GET["del_id"])){
                $id = $_GET['del_id'];
                $date = $_GET['date'];
                $price = $_GET['price'];

              $sql = "SELECT * FROM tbl_order
                      where id = '$id'
                      and 
                      date = '$date' 
                      and 
                      price = '$price'
                      order by id desc ";
              $delpost= $db->delete($sql);
              if ($delpost){
                 while ( $delimg = $delpost->fetch_assoc()){
                  $del_link = $delimg['image'];
                  unlink($del_link);
                 }
              }
              $del_query = "DELETE FROM tbl_order where id = '$id'
                      and 
                      date = '$date' 
                      and 
                      price = '$price'";
              $deldata = $db->delete($del_query);
              if ($deldata) {
                 echo "<span style='color:green; font-size:18px;'>Product deleted successfully.</span>";

              }
              else{
                echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
              }
            }
            ?>
              </div>
                <form>
                    <table style="margin-left: 50px;">          
                      <thead>
            <tr>
              <th width="10%"> CustomerID</th>
              <th width="20%">Date</th>
              <th width="20%">Product</th>
              <th width="10%">Quantity</th>
              <th width="10%">Price</th>
              <th width="10%">Image</th> 
              <th width="10%">Address</th>
              <th width="15%">Action</th>           
            </tr>
          </thead>
     <?php 
   $query = "select * from tbl_order order by date";
     $result = $db->select($query);
     if($result){
      $i = 0;
      while ($data = $result->fetch_assoc()) {
         $i++;
     ?>
          <tbody>
            <tr>
              <td><?php echo $data['session_id']; ?></td>
              <td><?php echo $sql_injection->formatDate($data['date']); ?></td>
              <td><?php echo $data['productName']; ?></td>
              <td><?php echo $data['quantity']; ?></td>
              <td><?php echo $data['price']; ?></td>
              <td><img src="<?php echo $data['image']; ?>" height="50px"; width="50px"></td> 
              <td><a href="viewaddress.php?address=<?php echo $data['session_id']; ?>" class="btn btn-danger">View Adress</a></td>                   
              <td>
    <?php 
      if($data['status'] == '0') {?>
                <a onclick="return confirm('Do you want to shit this product?');" href="?shiftid=<?php echo $data['session_id'];?>&price=<?php echo $data['price'];?>&date=<?php echo $data['date'];?>" class="btn btn-info">Shifted</a>
    <?php  } else{?>

         <a onclick="return confirm('Do you want to delete this post? if you click the ok button then your post will permanently delete');" href="?del_id=<?php echo $data['id'];?>&price=<?php echo $data['price'];?>&date=<?php echo $data['date'];?>" class="btn btn-info">Delete</a>
      </td>
 <?php } ?>
            </tr>
          </tbody>
          <?php } } ?>
                    </table>
                  </form>
            
        
            </div>

          </div>
        </section>
      </div>
    </div>

  <?php include('include/footer.php'); ?>  