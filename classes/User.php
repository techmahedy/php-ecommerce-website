<?php
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../library/Database.php');
 include_once ($filepath.'/../library/Helper.php');
 
  class User
  {
  	private $db;
  	private $validate;

  	function __construct()
  	{
  		$this->db = new Database();
  		$this->validate = new Helper();
  	}
    
    public function userRegister($data){
      error_reporting(0);
             $name     = $this->validate->validation($data['name']);
             $city   = $this->validate->validation($data['city']);
             $zip     = $this->validate->validation($data['zip']);
             $email     = $this->validate->validation($data['email']);
             $country   = $this->validate->validation($data['country']);
             $phone     = $this->validate->validation($data['phone']);
             $password   = $this->validate->validation(md5($data['password']));
              
              if (empty($name) || empty($city) || empty($zip) || empty($email) || empty($country) || empty($phone) || empty($password)) {
              $msg = "<span style='color:red;'> Please fill out this field </span>";
              return $msg;
              }

           $check = "select * from tbl_customer where email='$email'";
              $getData = $this->db->select($check);

            if ($getData == true) {
               $text ="<span style='color:red; font-size:18px;'>This email already exists.</span>";
              return $text;
              }
           else{ 
             $query = "INSERT INTO 
                       tbl_customer(name,city,zip,email,country,phone,password) 
                       VALUES('$name','$city','$zip','$email','$country','$phone','$password')";
              $insert = $this->db->insert($query);
              if ( $insert) {
                 $text ="<span style='color:green; font-size:18px;'>Registration done</span>";
                return $text;
              }else{
                $text ="<span style='color:red; font-size:18px;'>Sorry try again</span>";
                return $text;
              }

            }
       }

       public function userLogin($data){
             $email  = $data['email'];
             $password  = $data['password'];

             $email    = $this->validate->validation($_POST['email']);
             $password    = $this->validate->validation(md5($_POST['password']));

       $query  = "SELECT * FROM tbl_customer WHERE email = '$email' AND password = '$password'";
        $result = $this->db->select($query);

        if(empty($email) || empty($password)){
           $text = "<span style='color:red; font-size:18px;'>fill out this field first</span>";
           return $text;
        }
        elseif ($result == true) {
          $data = mysqli_fetch_array($result);
          $row = mysqli_num_rows($result);

          if ($row > 0) {
            Session::set("login",true);
            Session::set("name", $data['name']);
            Session::set("userId", $data['id']);
            $text =  "<script> window.location = 'index.php'; </script>";
            return $text;
          }
          else{
              $text = "<span style='color:red; font-size:18px;'>No data found</span>";
              return $text;
          }
         }
         else{
          $text =  "<span style='color:red; font-size:18px;'>Email or Password not matched</span>";
          return $text;
         }
        }

        public function userProfile($id){
           $query  = "SELECT * FROM tbl_customer WHERE id = '$id'";
           $result = $this->db->select($query);
           return $result;
        }
        public function updateUserProfile($data,$id){
             $name     = $this->validate->validation($data['name']);
             $city   = $this->validate->validation($data['city']);
             $zip     = $this->validate->validation($data['zip']);
             $email     = $this->validate->validation($data['email']);
             $country   = $this->validate->validation($data['country']);
             $phone     = $this->validate->validation($data['phone']);
             $password   = $this->validate->validation(md5($data['password']));
              
              if (empty($name) || empty($city) || empty($zip) || empty($email) || empty($country) || empty($phone) || empty($password)) {
              $msg = "<span style='color:red;'> Please fill out this field </span>";
              return $msg;
              }
           else{ 
             $query = "Update 
                       tbl_customer
                       set 
                       name = '$name',
                       city = '$city',
                       zip = '$zip',
                       email = '$email',
                       country = '$country',
                       phone = '$phone',
                       password = '$password'
                       where id = '$id'";
              $insert = $this->db->update($query);
              if ( $insert) {
                 $text ="<span style='color:green; font-size:18px;'>User updated</span>";
                return $text;
              }else{
                $text ="<span style='color:red; font-size:18px;'>Sorry try again</span>";
                return $text;
              }

            }
        }
  }
?>