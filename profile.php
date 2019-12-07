<?php include('include/header.php'); ?>
<section>
		<div class="container">
			<div class="row">

			<?php include('include/sidebar.php'); ?>
           <?php
                $name = Session::get("name");
                $id = Session::get("userId");
                $profile = $user->userProfile($id);
           ?>
<div class="container">
<div class="row">
<div class="col-sm-2">
</div>
<div class="col-sm-4"  style="margin-bottom: 200px;">
	<div class="signup-form"><!--sign up form-->
		<h2>Your Profile <?php echo $name; ?></h2>
	<?php
			 if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
               $updateProfile = $user->updateUserProfile($_POST,$id);
        
           if ($updateProfile)
            echo $updateProfile;
        }
        
    ?>
        <?php
        if ( $profile) {
        while ( $data = $profile->fetch_assoc()) {
      
        ?>
<form action="" method="post">
	<table>	
	Name
	<input type="text" name="name" value="<?php echo $data['name']; ?>" />
	City
	<input type="text" name="city" value="<?php echo $data['city']; ?>"/>
	Zip-Code
	<input type="text" name="zip" value="<?php echo $data['zip']; ?>"/>
	Email
	<input type="email" name="email" value="<?php echo $data['email']; ?>"/>
	Country
<input type="text"  name="country" value="<?php echo $data['country']; ?>"/>
Phone
	<input type="text" name="phone" value="<?php echo $data['phone']; ?>"/>
	Password
<input type="password" name="password" value="<?php echo $data['password']; ?>"/>
	<input type="submit" name="submit" class="btn btn-info" value="Update">
  </table>
</form>
	<?php } }  ?>
	</div><!--/sign up form-->
</div>
</div>
</div>
	</section><!--/form-->
	
	
	<?php include('include/footer.php'); ?>