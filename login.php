<?php include('include/header.php'); ?>
<section id="form"><!--form-->
<div class="container">
<div class="row">
<div class="col-sm-4 col-sm-offset-1">
	<div class="login-form"><!--login form-->
		<h2>Login to your account</h2>
	<?php
			 if (isset($_POST['login'])){
               $login = $user->userLogin($_POST);
        
           if ($login)
            echo $login;
        }
    ?>
		<form action="" method="post">
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<button name="login" class="btn btn-info">Login</button>
		</form>
	</div><!--/login form-->
</div>
<div class="col-sm-1">
	<h2 class="or">OR</h2>
</div>
<div class="col-sm-4">
	<div class="signup-form"><!--sign up form-->
		<h2>New User Signup!</h2>
	<?php
			 if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
               $register = $user->userRegister($_POST);
        
           if ($register)
            echo $register;
        }
    ?>

		<form action="" method="post">
			<input type="text" name="name" placeholder="Name"/>
			<input type="text" name="city" placeholder="City Address"/>
			<input type="text" name="zip" placeholder="Zip-code"/>
			<input type="email" name="email" placeholder="Email Address"/>
			<input type="text"  name="country" placeholder="Country"/>
			<input type="text" name="phone" placeholder="Phone"/>
			<input type="password" name="password" placeholder="Password"/>
			<input type="submit" name="submit" class="btn btn-info" value="Signup">
		</form>
	</div><!--/sign up form-->
</div>
</div>
</div>
	</section><!--/form-->
	
	
	<?php include('include/footer.php'); ?>