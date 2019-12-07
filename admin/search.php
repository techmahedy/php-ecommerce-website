<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>  

      <div class="content-wrapper">
        <section class="content">
          <div class="row">
       <?php
         if (!isset($_GET['search']) || $_GET['search'] == NULL ){
          echo "<script> window.location = 'index.php'; </script>";
         }
         else{
          $search = $_GET['search'];
          }
       ?>
         <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Search List</h3>
              </div>
         <?php 
            error_reporting(0);
              if (isset($_GET["del_id"])){
              $del_id = preg_replace('/[^-a-zA-Z0-9_]/', '',$_GET['del_id']);


              $sql = "SELECT * FROM tbl_product WHERE id='$del_id'";
              $delpost= $db->select($sql);
              if ($delpost){
                 while ( $delimg = $delpost->fetch_assoc()){
                  $del_link = $delimg['image'];
                  unlink($del_link);
                 }
              }
              $del_query = "DELETE FROM tbl_product WHERE id='$del_id'";
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
              <th width="5%">No</th>
              <th width="20%">Title</th>
              <th width="20%">Description</th>
              <th width="10%">Image</th>
              <th width="10%">Date</th>
              <th width="15%">Action</th>
            </tr>
          </thead>
     <?php 
     $query = "select * from tbl_product
               where name LIKE '%$search%' OR body LIKE '%$search%'";
     $result = $db->select($query);
     if($result){
      $i = 0;
      while ($data = $result->fetch_assoc()) {
         $i++;
     ?>
          <tbody>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $sql_injection->textShorten($data['body'],50); ?></td>
            <td> <img src="<?php echo $data['image']; ?>" height="50px"; width="50px"> </td>         
            <td><?php echo $sql_injection->formatDate($data['date']); ?></td>
            <td><a href="editproduct.php?edit_id=<?php echo $data['id'];?>" class="btn btn-info">Edit</a> 
    <?php 
      if(Session::get('level') == '0') {?>
                || <a onclick="return confirm('Do you want to delete this post? if you click the ok button then your post will permanently delete');" href="?del_id=<?php echo $data['id'];?>" class="btn btn-info">Delete</a>
    <?php  } ?>
              </td>
            </tr>
          </tbody>
          <?php } } else { echo "<span style='color:red;'>there is no such type of news </span>"; } ?>
                    </table>
                  </form>
            
        
            </div>

          </div>
        </section>
      </div>
    </div>

  <?php include('include/footer.php'); ?>  