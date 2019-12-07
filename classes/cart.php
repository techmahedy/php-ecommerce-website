<?php
 $filepath = realpath(dirname(__FILE__));
 include_once($filepath.'/../library/Database.php');
 include_once($filepath.'/../library/Helper.php');
 
  class Cart
  {
  	private  $db;
  	private  $validate;

  	function __construct()
  	{
  		$this->db = new Database();
  		$this->validate = new Helper();
  	}

    public function addToCartOperation($quantity,$ProductId){
      $quantity    = $this->validate->validation($_POST['quantity']);
      $quantity     = mysqli_real_escape_string($this->db->link,$quantity);
      $ProductId     = mysqli_real_escape_string($this->db->link,$ProductId);
      $session_id = session_id();

      $query = "SELECT * FROM tbl_product where id='$ProductId'";          
              $result = $this->db->select($query)->fetch_assoc();

      $productName = $result['name'];
      $price = $result['price'];
      $image = $result['image'];
     
      $checkSameProduct = "select * from tbl_cart where id = '$ProductId' and session_id = '$session_id'";
      $getData = $this->db->select($checkSameProduct);

       if ($getData) {
         $text ="<span style='color:red; font-size:18px;'>This product has already been sold.</span>";
         return $text;
       }
    else{
       $query = "INSERT INTO 
                 tbl_cart(session_id,product_id,product_name,price,quantity,image) 
                 VALUES('$session_id','$ProductId','$productName','$price','$quantity','$image')";

               $inserted_rows = $this->db->insert($query);
        if ($inserted_rows) {
           $msg =  "<script> window.location = 'cart.php'; </script>"; 
           return $msg;
        }
        else {
        $msg = "<script> window.location = '404.php'; </script>";
        return $msg;
        }
      }
    }
    
    public function getYourCartProduct(){
        $session_id = session_id();
        $query = "SELECT * FROM tbl_cart where session_id = '$session_id'";          
          $result = $this->db->select($query);
          return $result;
    }
    
    public function updateCart($quantity,$cartid){
      $quantity   = mysqli_real_escape_string($this->db->link,$quantity);
      $cartid     = mysqli_real_escape_string($this->db->link,$cartid);
              if (empty($quantity)) {
                  $msg= "<span style='color:red; font-size:18px;'>Enter name first </span>";
                  return $msg;
                  }
              else{
                   $query = "Update tbl_cart
                             set 
                             quantity = '$quantity'
                             where id = '$cartid'";
                   $data = $this->db->insert($query);
                   if ($data) {
                    echo "<script> window.location = 'cart.php'; </script>"; 
                   } 
                   else{
                     $msg= "<span style='color:red; font-size:18px;'>Sorry try again </span>";
                      return $msg;
                   }
               }
          }

      public function checkcartRow(){
         $session_id = session_id();
         $query = "SELECT * FROM tbl_cart where session_id = '$session_id'";      
         $result = $this->db->select($query);
         return $result;
      }


     public function deleteOrderProductAfterLogout()
     {
        $session_id = session_id();
        $query = "delete from tbl_cart where session_id = '$session_id'";
         $result = $this->db->delete($query);
         return $result;
     }

   public function orderProduct($id){
      $session_id = session_id();
      $query = "SELECT * FROM tbl_cart where session_id='$session_id'";      
      $result = $this->db->select($query);
       
       if ($result) {
         while ($data = $result->fetch_assoc()){
               $productId = $data['product_id'];
               $productName = $data['product_name'];
               $quantity = $data['quantity'];
               $price = $data['price'];
               $image = $data['image'];

          $query = "INSERT INTO 
                 tbl_order(session_id,productId,productName,quantity,price,image) 
                 VALUES('$id','$productId','$productName','$quantity','$price','$image')";

               $inserted_rows = $this->db->insert($query);
            }
             if ($inserted_rows) {
                    $msg =  "<script> alert('Your order has done successfully'); </script>"; 
                    return $msg;
                   } 
                   else{
                     $msg= "<span style='color:red; font-size:18px;'>Sorry try again </span>";
                      return $msg;
                   }
       }
   }



     }
?>