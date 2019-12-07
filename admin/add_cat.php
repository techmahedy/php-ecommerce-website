<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>
   
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Add Category</h3>
             <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  $cat_name     = $_POST['cat_name'];
                  $cat_name     = $sql_injection->validation($_POST['cat_name']);
                  $cat_name     = mysqli_real_escape_string($db->link,$cat_name);

                  if (empty($cat_name)) {
                     echo "<span style='color:red; font-size:18px;'>Enter category name first </span>";
                  }else{
                   $query = "INSERT INTO  
                             tbl_category(cat_name)
                             VALUES('$cat_name')";
                   $data = $db->insert($query);
                   if ($data) {
                     echo "<span style='color:green; font-size:18px;'>category inserted successfully </span>";
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
            <td>
                <input type="text" class="medium" name="cat_name" />
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
