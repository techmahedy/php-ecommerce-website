 <?php include 'include/header.php'; ?>

   <?php include 'include/sidebar.php'; ?>

     <div class="content-wrapper">
        <section class="content">
          <div class="row">

         <div class="col-md-12">
            <!-- Website Overview -->  
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3>Add Product </h3>
              </div>

 <?php
    error_reporting(0);
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
    
      $name     = $sql_injection->validation($_POST['name']);
      $cat_id   = $sql_injection->validation($_POST['cat_id']);
      $brand_id = $sql_injection->validation($_POST['brand_id']);
      $body     = $sql_injection->validation($_POST['body']);
      $price    = $sql_injection->validation($_POST['price']);
      $image    = $sql_injection->validation($_POST['image']);
      $type    = $sql_injection->validation($_POST['type']);
     
     

      $name  = mysqli_real_escape_string($db->link,$_POST['name']);
      $cat_id    = mysqli_real_escape_string($db->link,$_POST['cat_id']);
      $brand_id   = mysqli_real_escape_string($db->link,$_POST['brand_id']);
      $body   = mysqli_real_escape_string($db->link,$_POST['body']);
      $price = mysqli_real_escape_string($db->link,$_POST['price']);
      $image = mysqli_real_escape_string($db->link,$_POST['image']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "img/".$unique_image;

        if ($name == "" || $cat_id == "" || $brand_id == "" || $body == "" || $price == "" || $file_name == "" || $type ==""){
        echo "<span style='color:red; font-size:18px;'>Please fill out those field first</span>";
        }

        elseif ($file_size >1048567) {
         echo "<span class='error'>Image Size should be less then 1MB!
         </span>";
        }
        elseif (in_array($file_ext, $permited) === false){
         echo "<span class='error'>You can upload only:-"
         .implode(', ', $permited)."</span>";
        } 

 else{
     move_uploaded_file($file_temp, $uploaded_image);

     $query = "INSERT INTO 
               tbl_blog(cat_id,brand_id,name,body,image,price,type) 
               VALUES('$cat_id','$brand_id','$name','$body','$uploaded_image','$price','$type')";

               $inserted_rows = $db->insert($query);
        if ($inserted_rows) {
         echo "<span style='color:green; font-size:18px;'>Blog post inserted successfully.</span>";      
        }
        else {
         echo "<span style='color:red; font-size:18px;'>There has been error. please try again</span>";
        }
      }

   }
?>

            </div>
  <form action="" method="post" enctype="multipart/form-data">
    <table>
       
        <tr>
            <td>
                <label>Product Name</label>
            </td>
            <td>
                <input type="text" class="medium" name="name" />
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

                    <option value="<?php echo $result['id']; ?>"><?php echo $result['cat_name']; ?></option>

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

                    <option value="<?php echo $result['id']; ?>"><?php echo $result['brand_name']; ?></option>

                    <?php   }   } ?>
                                                   
                </select>
            </td>
        </tr>
    
        <tr>
            <td>
                <label>Date Picker</label>
            </td>
            <td>
                <input type="text" id="datepicker" />
            </td>
        </tr>
        <tr>
            <td>
                <label>Upload Image</label>
            </td>
            <td>
                <input type="file" name="image" />
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top; padding-top: 9px;">
                <label>Content</label>
            </td>
            <td>
                <textarea class="tinymce" name="body"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label>Product Price</label>
            </td>
            <td>
                <input type="number" class="medium" name="price" />
            </td>
        </tr>
        <tr>
            <td>
                <label>Product Type</label>
            </td>
            <td>
                <select id="select" name="type">
                    <option>Select type</option>
                    <option value="0">General</option>
                    <option value="1">Feature</option>                
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
