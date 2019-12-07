<?php include('include/header.php'); ?>

   <?php include('include/sidebar.php');  ?>  
     
      <?php                
           if (isset($_GET["address"])){
            $address = preg_replace('/[^-a-zA-Z0-9_]/', '',$_GET['address']);
              }      
        ?>

      <div class="content-wrapper">
        <section class="content">
          <div class="row">

         <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>User Information</h3>
              </div>
          </div>
 <form action="" method="post">
    <table>
       <?php
          $query = "SELECT * FROM tbl_customer WHERE id='$address'";
          $getpost = $db->select($query);
          if ($getpost) {
           while ( $postresult = $getpost->fetch_assoc()){
              
         ?>   
        <tr>
            <td>
                <label>Name</label>
            </td>
            <td>
                <input type="text" readonly="" class="medium" name="name" value="<?php echo $postresult['name'];?>"/>
            </td>
        </tr>
         
         <tr>
            <td>
                <label>City</label>
            </td>
            <td>
                <input type="text"  readonly="" class="medium" name="username" value="<?php echo $postresult['city'];?>">
            </td>
        </tr>
         <tr>
            <td>
                <label>Zip-Code</label>
            </td>
            <td>
                <input type="text"  readonly="" class="medium" name="username" value="<?php echo $postresult['zip'];?>">
            </td>
        </tr>
         <tr>
            <td>
                <label>Email</label>
            </td>
            <td>
                <input style="width: 300px;" type="email" class="medium" name="email"  readonly="" value="<?php echo $postresult['email'];?>" />
            </td>
        </tr>
         <tr>
            <td>
                <label>Country</label>
            </td>
            <td>
                <input type="text" readonly="" class="medium" name="username" value="<?php echo $postresult['country'];?>">
            </td>
        </tr>
          <tr>
            <td>
                <label>Phone</label>
            </td>
            <td>
                <input type="text"  readonly="" class="medium" name="username" value="<?php echo $postresult['phone'];?>">
            </td>
        </tr>
         <tr>
            <td>
                
            </td>
            <td>
               <a href="orderlist.php" class="btn btn-primary">Back</a>
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