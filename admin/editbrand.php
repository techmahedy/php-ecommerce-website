<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>
   
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">

        <?php                
           if (isset($_GET["editId"])){
            $editId = preg_replace('/[^-a-zA-Z0-9_]/', '',$_GET['editId']);
              }               
        ?>
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Updated Category</h3>
             <?php
           
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  $brand_name     = $_POST['brand_name'];
                  $brand_name     = $sql_injection->validation($_POST['brand_name']);
                  $brand_name     = mysqli_real_escape_string($db->link,$brand_name);

                  if (empty($brand_name)) {
                     echo "<span style='color:red; font-size:18px;'>Enter brand name first </span>";
                  }else{
                   $query = "Update tbl_brand
                             set 
                             brand_name = '$brand_name'
                             where id = '$editId'";
                   $data = $db->insert($query);
                   if ($data) {
                     echo "<span style='color:green; font-size:18px;'>Brand updated successfully </span>";
                     }else{
                       echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
                     }
                   }
                }
              ?>
              </div>
              </div>
 <form action="" method="post">
  <table>     
        <tr>
            <td>
                <label>Category Name</label>
            </td>

            <?php 
               $query = "SELECT * FROM tbl_brand where id = '$editId'";
               $result = $db->select($query);
               if ($result) {
                $i=0;
                while ($data = $result->fetch_assoc()) {
                 $i++;
            ?>

            <td>
                <input type="text" class="medium" name="brand_name" value="<?php echo $data['brand_name']; ?>" />
            </td>
            <?php } } ?>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" Value="Insert" />
            </td>
        </tr>
    </table>
    </form>
        
           </div>
          </div>
        </section>
      </div>
    </div>
  </body>
</html>

<?php include 'include/footer.php'; ?>
