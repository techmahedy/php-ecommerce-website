<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>  

      <div class="content-wrapper">
        <section class="content">
          <div class="row">
     
         <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Product Comment</h3>
              </div>
                 <?php 
         
              if (isset($_GET["del_post_id"])){
              $del_post_id = preg_replace('/[^-a-zA-Z0-9_]/', '',$_GET['del_post_id']);

              $del_query = "DELETE FROM tbl_comment WHERE id='$del_post_id'";
              $deldata = $db->delete($del_query);
              if ($deldata) {
                 echo "<span style='color:green; font-size:18px;'>Comment deleted successfully.</span>";

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
              <th width="10%">No</th>
              <th width="15%">Name</th>
              <th width="25%">Description</th>
              <th width="10%">Image</th>
              <th width="20%">Date</th>
              <th width="20%">Action</th>
            </tr>
          </thead>
     <?php 
     $query = "select tbl_blog.*,tbl_comment.*
               from tbl_blog
               inner join tbl_comment
               on tbl_blog.id = tbl_comment.post_id
               order by tbl_blog.id desc limit 10";
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
              <td>
    <?php 
      if(Session::get('userRole') == '0') {?>
                <a onclick="return confirm('Do you want to delete this post? if you click the ok button then your post will permanently delete');" href="?del_post_id=<?php echo $data['id'];?>" class="btn btn-info">Delete</a>
    <?php  } ?>
              </td>
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