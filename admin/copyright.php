<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>
   
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Update Copyright</h3>
              </div>
              </div>

 <form action="" method="post">
   <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                  $text     = $_POST['text'];
                  $text     = $_POST['text'];

                  if (empty($text)) {
                     echo "<span style='color:red; font-size:18px;'>Enter Copyright name first </span>";
                  }else{
                   $query = "Update tbl_copyright  
                             set
                             text = '$text'";
                   $data = $db->insert($query);
                   if ($data) {
                     echo "<span style='color:green; font-size:18px;'>Copyright updated successfully </span>";
                     }else{
                       echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
                     }
                   }
                }
              ?>
  <table>     
                      
       <?php 
        $query  = "SELECT * FROM tbl_copyright";
        $result = $db->select($query);
         if ($result) {
          while ( $data = $result->fetch_assoc()) {


       ?>
        <tr>
            <td>
                <label>Copyright</label>
            </td>
            <td>
               <textarea class="tinymce" name="text"><?php  echo $data['text'];?> </textarea>
            </td>
        </tr>  

        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" Value="Save" />
            </td>
        </tr>
        <?php } } ?>
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
