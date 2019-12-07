 <?php include 'include/header.php'; ?>

   <?php include 'include/sidebar.php'; ?>

     <div class="content-wrapper">
        <section class="content">
          <div class="row">
      <?php 
        if (!isset($_GET["edit_id"]) || $_GET["edit_id"] == NULL ){
         echo "<script> window.location = 'productlist.php'; </script>";
      }else{
        $edit_id = preg_replace('/[^-a-zA-Z0-9_]/', '',$_GET['edit_id']);
      }
    ?>
         <div class="col-md-12">
            <!-- Website Overview -->  
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Edit Product </h3>
              </div>

       
  <?php
      if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $name  = mysqli_real_escape_string($db->link,$_POST['name']);
        $cat_id    = mysqli_real_escape_string($db->link,$_POST['cat_id']);
      $brand_id   = mysqli_real_escape_string($db->link,$_POST['brand_id']);
        $body   = mysqli_real_escape_string($db->link,$_POST['body']);
        $price = mysqli_real_escape_string($db->link,$_POST['price']);
        $type = mysqli_real_escape_string($db->link,$_POST['type']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "img/".$unique_image;

        if ($name == "" || $cat_id == "" || $brand_id == "" || $body == "" || $price == ""|| $type == ""){
        echo "<span style='color:red;'> please fill out this field first</span>";
        }

        
      if (!empty($file_name)){
          
        if ($file_size >1048567) {
         echo "<span class='error'>Image Size should be less then 1MB!
         </span>";
        }
      elseif (in_array($file_ext, $permited) === false){
         echo "<span class='error'>You can upload only:-"
         .implode(', ', $permited)."</span>";
        } 

      else{
           move_uploaded_file($file_temp, $uploaded_image);
        $query = "UPDATE tbl_product
                  SET 
                  cat_id='$cat_id',
                  brand_id='$brand_id',
                  name='$name',
                  body='$body',
                  price='$price', 
                  image='$uploaded_image',              
                  type='$type'
                  WHERE id='$edit_id'";
                 


         $updated_rows = $db->update($query);
            if ($updated_rows) {
             echo "<span style='color:green; font-size:18px;'>Product updated successfully</span>";
            
        }
        else {
          echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
        }
      }
     }
  }
?>
            </div>
  <form action="" method="post" enctype="multipart/form-data">

     <?php
      $query = "SELECT * FROM tbl_product WHERE id='$edit_id'";
      $getpost = $db->select($query);
      if ($getpost) {
       while ( $postresult = $getpost->fetch_assoc()){
      
    ?> 

    <table>
       
        <tr>
            <td>
                <label>Product Name</label>
            </td>
            <td>
                <input type="text" class="medium" name="name" value="<?php echo $postresult ['name'];?>" />
            </td>
        </tr>
     
        <tr>
            <td>
                <label>Category</label>
            </td>
            <td>
                <select id="select" name="cat_id">
                    <option>Select category</option>
                 <?php
                    $query = "select * from tbl_category";
                    $data = $db->select($query);
                    if ($data) {
                       while ($result = $data->fetch_assoc()) {     
                
                    ?>

                    <option 
                    <?php
               if ($postresult['cat_id'] == $result['id'] ) { ?>
                   selected="selected"
                 <?php   } ?>

                    value="<?php echo $result['id']; ?>"><?php echo $result['cat_name']; ?></option>

                    <?php   }   } ?>
                                         
                </select>
            </td>
        </tr>
         
         <tr>
            <td>
                <label>Brand</label>
            </td>
            <td>
                <select id="select" name="brand_id">
                    <option>Select brand</option>
                    <?php
                    $query = "select * from tbl_brand";
                    $data = $db->select($query);
                    if ($data) {
                       while ($result = $data->fetch_assoc()) {     
                
                    ?>

                    <option 
                    <?php             
                  if ($postresult['brand_id'] == $result['id'] ) { ?>
                   selected="selected"
                 <?php   } ?>

                  value="<?php echo $result['id']; ?>"><?php echo $result['brand_name']; ?></option>

                    <?php   }   } ?>
                                                   
                </select>
            </td>
        </tr>
  
        <tr>
            <td>
                <label>Upload Image</label>
            </td>
            <td>
               <img src="<?php echo $postresult['image'];?>" height="50px"; width="50px">
                <input type="file" name="image"/>
               
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top; padding-top: 9px;">
                <label>Content</label>
            </td>
            <td>
                <textarea class="tinymce" name="body">
                  <?php echo $postresult['body'];?>
                </textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label>Product Price</label>
            </td>
            <td>
                <input type="number" class="medium" name="price" value="<?php echo $postresult ['price'];?>"/>
            </td>
        </tr>
        <tr>
            <td>
                <label>Product Type</label>
            </td>
            <td>
                <select id="select" name="type">
                    <?php if ($postresult['type'] == '0'){ ?>
                    <option value="0">General</option>
                    <option value="1">Feature</option>  
                  <?php } else { ?>
                    <option value="1">Feature</option>    
                    <option value="0">General</option> 
                  <?php } ?> 
                </select>
            </td>
        </tr>


        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" Value="Save" />
            </td>
        </tr>
    </table>
     <?php } } ?>
    </form>
            </div>
          </div>
        </section>
      </div>
    </div>

 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
  $(function(){
    $("#datepicker").datepicker();
  });
  </script>

<?php include 'include/footer.php'; ?>

<style type="text/css">
      h3{font-weight: 800; margin-left: 37px;}
 </style>
