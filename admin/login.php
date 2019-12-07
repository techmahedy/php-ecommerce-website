<?php include '../library/Session.php';
     Session::checkLogin(); 
?>

<?php include '../config/config.php'; ?>
<?php include '../library/Database.php'; ?>
<?php include '../library/Helper.php'; ?>

<?php 
 $db = new Database();
 $sql_injection = new helper()
?>

<html>
	<head>
		<title>Admin Login</title>
		<link rel="stylesheet" href="login_css/login.css">
	</head>
	<body>
		<div class="login-box">
			<img src="img/me.png" class="avatar">
			<h1>Admin Login</h1>
			  <?php
			  
	   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	   	$username  = $_POST['username'];
	    $password  = $_POST['password'];

	    $username    = $sql_injection->validation($_POST['username']);
	    $password    = $sql_injection->validation(md5($_POST['password']));

	    $username     = mysqli_real_escape_string($db->link,$username);
	    $password     = mysqli_real_escape_string($db->link,$password);

	    $query  = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
        $result = $db->select($query);

        if(empty($username) || empty($password)){
           echo "<span style='color:red; font-size:18px;'>fill out this field first</span>";
        }
        elseif ($result == true) {
        	$data = mysqli_fetch_array($result);
        	$row = mysqli_num_rows($result);

        	if ($row > 0) {
        		Session::set("login",true);
        		Session::set("username", $data['username']);
        		Session::set("userId", $data['id']);
        		Session::set("level", $data['level']);
        		
        		echo "<script> window.location = 'index.php'; </script>";
        	}else{
               echo "<span style='color:red; font-size:18px;'>No data found</span>";
        	}
         }
         else{
         	echo "<span style='color:red; font-size:18px;'>Email or Password not matched</span>";
         }
	   }
	?>
			<form action="" method="post">
				<p>Username</p><br>
				<input type="text" name="username" placeholder="Enter username">
				<p>Password</p><br>
				<input type="password" name="password" placeholder="Enter password">
				<input type="submit" name="submit" value="login">
				<a href="reco_pass.php">forget password ?</a>
			</form>
		</div>
	</body>
</html>