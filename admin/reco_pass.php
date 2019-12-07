
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
		<title>Recover Password</title>
		<link rel="stylesheet" href="login_css/login.css">
	</head>
	<body>
		<div class="login-box">
			<img src="img/me.png" class="avatar">
			<h1>Recover Password</h1>
				<?php
		  if ($_SERVER['REQUEST_METHOD'] == "POST"){
		         $email = $sql_injection->validation($_POST['email']);                
                 $email = mysqli_real_escape_string($db->link,$email);
                   
             if(empty($email)){
                  echo "<span style='color:red; font-size:18px;'>Enter your email address</span>";
                 }
             elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                 	 echo "<span style='color:red; font-size:18px;'>invalid email address</span>";
                }
              else{
                
                $checkmail = "SELECT * FROM tbl_admin WHERE email ='$email' LIMIT 1";
                 $result = $db->select($checkmail);
             
                 if ($result == true) {

                  while($value = $result->fetch_assoc()){
                      $userId = $value['id'];
                      $userName = $value['username'];
                  }
                    $text = substr($email, 0, 3);
                    $random = rand(10000, 99999);
                    $newpassword = "$text$random";
                    $getpass = md5($newpassword);

                    $sql = "UPDATE  tbl_admin
                    SET password = '$getpass'
                    WHERE id = '$userId'";

		            $Passwordupdated = $db->update($sql);
		            
		            $to    = "$email";
		            $from  = "www.e-shopper.com";
		            $headers = "From: $from\n";

		        $headers .= 'MIME-Version: 1.0'."\r\n";
		        $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

                    $subject = "Your Recover Password";
                    $message = "Your user name is ".$userName." and Password is ".$newpassword." please visit website to login";

		            $sendmail = mail($to, $subject, $message, $headers);
		            if ($sendmail) {
		            	echo "<span style='color:green; font-size:20px;'> Check your email for login, Check your spam message also</span>";
		            }else{
                      echo "<span style='color:red; font-size:20px;'>Mail tot sent</span>";
		            }

		         }
                 	else{
                 		echo "<span style='color:red; font-size:20px;'> Email doesn,t exists </span>";
                 	}
		       }
		   }
		?>
			<form action="" method="post">
				<p>Email</p><br>
			<input type="text" name="email" placeholder="Enter your email">
				<input type="submit" name="submit" value="Update">
				<a href="login.php">Login</a>
			</form>
		</div>
	</body>
</html>
