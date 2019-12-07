<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>
   
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Add Brand</h3>
             <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  $brand_name     = $_POST['brand_name'];
                  $brand_name     = $sql_injection->validation($_POST['brand_name']);
                  $cat_name     = mysqli_real_escape_string($db->link,$brand_name);

                  if (empty($brand_name)) {
                     echo "<span style='color:red; font-size:18px;'>Enter brand name first </span>";
                  }else{
                   $query = "INSERT INTO  
                             tbl_brand(brand_name)
                             VALUES('$brand_name')";
                   $data = $db->insert($query);
                   if ($data) {
                     echo "<span style='color:green; font-size:18px;'>brand inserted successfully </span>";
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
                <label>Brand Name</label>
            </td>
            <td>
                <input type="text" class="medium" name="brand_name" />
            </td>
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
