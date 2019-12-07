<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>
   
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Update Address</h3>
              </div>
        <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $phone     = $_POST['phone'];
            $email     = $_POST['email'];
            $phone     = $sql_injection->validation($_POST['phone']);
            $email     = mysqli_real_escape_string($db->link,$email);

                  if (empty($phone) || empty($email)) {
                     echo "<span style='color:red; font-size:18px;'>Enter address name first </span>";
                  }else{
                   $query = "Update tbl_address  
                             set
                             phone = '$phone',
                             email = '$email'";
                   $data = $db->insert($query);
                   if ($data) {
                     echo "<span style='color:green; font-size:18px;'>Address updated successfully </span>";
                     }else{
                       echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
                     }
                   }
                }
         ?>
              </div>
 <form action="" method="post">
    <?php 
        $query  = "SELECT * FROM tbl_address";
        $result = $db->select($query);
         if ($result) {
          while ( $data = $result->fetch_assoc()) {


       ?>
  <table>     
                      
       
        <tr>
            <td>
                <label>Phone</label>
            </td>
            <td>
                <input type="text" class="medium" name="phone" value="<?php  echo $data['phone'];?> " />
            </td>
        </tr>  
          <tr>
            <td>
                <label>Email</label>
            </td>
            <td>
                <input type="text" class="medium" name="email" value="<?php  echo $data['email'];?> " />
            </td>
        </tr>  

        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" Value="Update" />
            </td>
        </tr>
    </table>
       <?php  } } ?>
    </form>
        
           </div>
          </div>
        </section>
      </div>
    </div>
  </body>
</html>

<?php include 'include/footer.php'; ?>
