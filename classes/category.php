<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../library/Database.php');
 include_once ($filepath.'/../library/Helper.php');
 
  class Category
  {
  	private $db;
  	private $validate;

  	function __construct()
  	{
  		$this->db = new Database();
  		$this->validate = new Helper();
  	}

    public function getCategoryName(){
       $query = "SELECT * FROM tbl_category";          
              $result = $this->db->select($query);
               return $result;
    }
    
    public function getBrandsName(){
      $query = "SELECT * FROM tbl_brand";          
              $result = $this->db->select($query);
               return $result;
    }
  }
?>