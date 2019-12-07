<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../library/Database.php');
 include_once ($filepath.'/../library/Helper.php');
 
  class Blog
  {
  	private $db;
  	private $validate;

  	function __construct()
  	{
  		$this->db = new Database();
  		$this->validate = new Helper();
  	}

    public function getBlogData($start_from,$per_page){
      $query = "select p.* , c.cat_name , b.brand_name
                from tbl_blog as p , tbl_category as c , tbl_brand as b 
                where p.cat_id = c.id and p.brand_id = b.id 
                order by p.id desc limit $start_from, $per_page";       
              $result = $this->db->select($query);
               return $result;
    }
    
    public function blogPostComment($data,$blogId){
    $name  = $data['name'];
    $email = $data['email'];
    $body  = $data['body'];
   
    if (empty($name) || empty($email) || empty($body)) {
       echo "<span style='color:red; font-size:18px;'> please fill out this field first</span>";   
    }
    else{
       $sql = "INSERT INTO `tbl_comment` (`id`, `name`, `email`, `body`, `date`, `post_id`) VALUES (NULL, '$name', '$email', '$body', CURRENT_TIMESTAMP, '$blogId')";
        
         $user = $this->db->insert($sql);
            if ($user){
              $msg =  "<script> alert('Your comment has done successfully'); </script>"; 
                    return $msg;
            }else{
                $msg= "<span style='color:red; font-size:18px;'>Sorry try again </span>";
                      return $msg;
           }
        } 
      }
      
       public function getBlogPostComment($blogId){
        $query = "select * from tbl_comment where post_id = '$blogId'";   
              $data = $this->db->select($query);
              return $data;
        }


 public function productFeedback($data,$seeProductId){
    $name  = $data['name'];
    $email = $data['email'];
    $body  = $data['body'];
   
    if (empty($name) || empty($email) || empty($body)) {
       echo "<span style='color:red; font-size:18px;'> please fill out this field first</span>";   
    }
    else{
       $sql = "INSERT INTO `tbl_product_comment` (`id`, `name`, `email`, `body`, `date`, `product_id`) VALUES (NULL, '$name', '$email', '$body', CURRENT_TIMESTAMP, '$seeProductId')";
        
         $user = $this->db->insert($sql);
            if ($user){
              $msg =  "<script> alert('Your comment has done successfully'); </script>"; 
                    return $msg;
            }else{
                $msg= "<span style='color:red; font-size:18px;'>Sorry try again </span>";
                      return $msg;
           }
        } 
      }

        public function getProductComment($seeProductId){
        $query = "select * from tbl_product_comment where product_id = '$seeProductId'";   
              $data = $this->db->select($query);
              return $data;
        }
      
  }
?>