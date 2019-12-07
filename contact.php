<?php include('include/header.php'); ?>
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
<?php      
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
     $name = $helper->validation($_POST['name']);
     $email     = $helper->validation($_POST['email']);
     $subject     = $helper->validation($_POST['subject']);
     $message    = $helper->validation($_POST['message']);

     $name  = mysqli_real_escape_string($db->link,$name); 
     $email      = mysqli_real_escape_string($db->link,$email);
     $subject      = mysqli_real_escape_string($db->link,$subject);
     $message   = mysqli_real_escape_string($db->link,$message); 
     
    
     if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      echo "<span style='color:red; font-size:18px;'>sorry, email address is invalid</span>";
     }
     else{
      $query = "INSERT INTO 
               tbl_contact(name,email,subject,message) 
                VALUES('$name','$email','$subject','$message') ";

         $inserted_rows = $db->insert($query);
        if ($inserted_rows){
         echo "<span style='color:green; font-size:18px;'>Message sent</span>";         
        }
        else {
         echo "<span style='color:red; font-size:18px;'>Sorry , try again</span>";
        }
     }
}
?>


	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>E-Shopper Inc.</p>
							<p>935 W. New Market Pabna New Streets Hamid Road</p>
							<p>Pabna - Bangladesh</p>
							<p>Mobile: +88 01764-908494</p>					
							<p>Email: info@e-shopper.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	
	<?php include('include/footer.php'); ?>