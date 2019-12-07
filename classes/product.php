<?php
 $filepath = realpath(dirname(__FILE__));
 include_once($filepath.'/../library/Database.php');
 include_once($filepath.'/../library/Helper.php');
 
  class Product
  {
  	private  $db;
  	private  $validate;

  	function __construct()
  	{
  		$this->db = new Database();
  		$this->validate = new Helper();
  	}

    public function getFeatureProduct($start_from,$per_page){
            $query = "SELECT * FROM tbl_product where type = '1' order by id desc limit $start_from,$per_page";          
          	  $result = $this->db->select($query);
               return $result;
    }

    public function getNonFeatureProduct($start_from,$per_page){
    	 $query = "SELECT * FROM tbl_product where type = '0' order by id desc limit $start_from,$per_page";          
          	  $result = $this->db->select($query);
               return $result;
    }

    public function getSingleProductDetail($seeProductId){
    	$query = "select p.* , c.cat_name , b.brand_name
    	          from tbl_product as p , tbl_category as c , tbl_brand as b 
    	          where p.cat_id = c.id
    	          and p.brand_id = b.id 
    	          and p.id = '$seeProductId'";
    	          $result = $this->db->select($query);
    	          return $result;
     }







  }
?>