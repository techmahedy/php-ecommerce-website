<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>  

      <div class="content-wrapper">
        <section class="content">
          <div class="row">

      <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Brand List</h3>
       <?php

       if (isset($_GET["deleteId"])){
         $deleteId = preg_replace('/[^-a-zA-Z0-9_]/', '',$_GET['deleteId']);
         $query = "DELETE FROM tbl_brand WHERE id = '$deleteId'";
         $data = $db->delete($query);
         if ($data) {
             echo "<span style='color:green; font-size:18px;'>Brand deleted successfully </span>";
             }else{
               echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
             }
           }
        ?>

        
              </div>
              </div>

         <form action="" method="post">
         <table style="margin-left: 50px;">          
               
            <tr>
              <th width="10%">No</th>
             
              <th width="20%">Category Name</th>
             
              <th width="30%">Date</th>
              <th width="40%">Action</th>
            </tr>
        
         
         
             <?php 
               $query = "SELECT * FROM tbl_brand";
               $result = $db->select($query);
               if ($result) {
                $i=0;
                while ($data = $result->fetch_assoc()) {
                 $i++;
            ?>
            <tr>            
              <td><?php echo $i;?></td>
              <td><?php echo $data['brand_name'];?></td>
              <td><?php echo $sql_injection->formatDate($data['date']); ?></td>
              <td><a href="editbrand.php?editId=<?php echo $data['id'];?>" class="btn btn-info" style="margin-top: 3px;">Edit</a> 
   
                || <a onclick="return confirm('Do you want to delete this post? if you click the ok button then your post will permanently delete');" href="?deleteId=<?php echo $data['id'];?>" class="btn btn-info" style="margin-top: 3px;">Delete</a>  
              </td>
            </tr>
             <?php  } } ?>
          
      </table>
    </form>
            
        
            </div>

          </div>
        </section>
      </div>
    </div>

  <?php include('include/footer.php'); ?>  