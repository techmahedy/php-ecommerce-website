<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php'); ?>
   
      <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Update Social Icon</h3>
              </div>
       <?php

        if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $facebook = $sql_injection->validation($_POST['facebook']);
        $twitter = $sql_injection->validation($_POST['twitter']);
        $linkedin = $sql_injection->validation($_POST['linkedin']);
        $youtube = $sql_injection->validation($_POST['youtube']);
        $googleplus = $sql_injection->validation($_POST['googleplus']);
      

         if ($facebook == "" || $twitter == "" || $linkedin == "" ||
            $youtube == "" || $googleplus == ""){
           echo "<span style='color:red; font-size:18px;'>Please fill out those field first</span>";
         }
         else{
              $query = "UPDATE tbl_icon
                  SET 
                  facebook='$facebook',
                  twitter='$twitter', 
                  linkedin='$linkedin',  
                  youtube='$youtube',              
                  googleplus='$googleplus'                    
                  WHERE id='1'";
         $updated_rows = $db->update($query);
            if ($updated_rows) {
             echo "<span style='color:green; font-size:18px;'>Icon updated</span>";
            
        }
        else {
             echo "<span style='color:red; font-size:18px;'>Sorry,there has been problem. try again</span>";
        }
     }
   }
  ?>
              </div>
 <form action="" method="post">
  <table>     
                      
                       
    <?php 
         $sql = "SELECT * FROM  tbl_icon WHERE id='1'";
        $message = $db->select($sql);
         if ($message) {
          while ( $result = $message->fetch_assoc()) {

       ?>
        <tr>
            <td>
                <label>Facebook</label>
            </td>
            <td>
                <input type="text" class="medium" name="facebook" value="<?php  echo $result['facebook'];?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Twitter</label>
            </td>
            <td>
                <input type="text" class="medium" name="twitter" value="<?php  echo $result['twitter'];?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Linkedin</label>
            </td>
            <td>
                <input type="text" class="medium" name="linkedin" value="<?php  echo $result['linkedin'];?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Youtube</label>
            </td>
            <td>
                <input type="text" class="medium" name="youtube" value="<?php  echo $result['youtube'];?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Google-plus</label>
            </td>
            <td>
                <input type="text" class="medium" name="googleplus" value="<?php  echo $result['googleplus'];?>"/>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" Value="Update" />
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
