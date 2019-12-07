
<?php
include'library/Session.php';
 Session::init();
?>
<?php include'config/config.php'; ?>
<?php include'library/Database.php'; ?>
<?php include'library/Helper.php'; ?>
<?php include'classes/cart.php'; ?>
<?php include'classes/User.php'; ?>
<?php include'classes/product.php'; ?>
<?php include'classes/Blog.php'; ?>


<?php
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); 
header("Pragma: no-cache"); 
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>

<?php
     
     $db = new Database();
     $cart = new Cart();
     $helper = new Helper();
     $user = new User();
     $product = new Product();
     $blog = new Blog();

 ?>


     <?php
          if (isset($_GET['userid'])) {
          	  $cartDelete = $cart->deleteOrderProductAfterLogout();
              Session::destroy();  
              exit();                   
          }
      ?>


<!DOCTYPE html>
<html lang="en">

    <?php
          if (isset($_GET['blogId'])) {
            $blogId = $_GET['blogId'];
          }
              
     ?>

<head>
	<?php
       //Showing page name on header
       if (isset($_GET['seeProductId'])) {
          $page_title_id = $_GET['seeProductId'];
           $sql = "select * from tbl_product where id = '$page_title_id'";
           $data = $db->select($sql);
           if ($data) {
            while ($result = $data->fetch_assoc()) { ?>
                     <title><?php echo $result['name']; ?>/<?php echo TITLE; ?></title>
                     <?php
                   } 
                 } 
              }  
          elseif (isset($_GET['blogId'])) {
                   $page_title_id = $_GET['blogId'];
           $sql = "select * from tbl_blog where id = '$page_title_id'";
           $data = $db->select($sql);
           if ($data) {
            while ($result = $data->fetch_assoc()) { ?>
                     <title><?php echo $result['name']; ?>/<?php echo TITLE; ?></title>
                     <?php
                   } 
                 } 
             }          
   
       else { ?>
       <title><?php echo $helper->title(); ?>/<?php echo TITLE; ?></title>
       <?php } ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">   
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css">
    	#active{color:#FE980F;}
    </style>
   
</head>
     <?php 
           //HIGHLIGHTING NAV BAR
            $path = $_SERVER['SCRIPT_FILENAME'];
            $current_page = basename($path,'.php');
      ?>

<body>
	<header id="header">
		<div class="header_top">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">

	 <?php 
        $query  = "SELECT * FROM tbl_address";
        $result = $db->select($query);
         if ($result) {
          while ( $data = $result->fetch_assoc()) {
       ?>
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i><?php  echo $data['phone'];?></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> <?php  echo $data['email'];?> </a></li>
							</ul>
							<?php } } ?>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">			
                              <?php
                              $login = Session::get("login");
                              if ($login) {                                                      
                              ?>
                             <li><a 
        <?php 
		  if ($current_page == 'checkout')
		  	{ echo 'id="active"';
		  }
		 ?>
                             	href="checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>

                             <li><a
        <?php 
		  if ($current_page == 'cart')
		  	{ echo 'id="active"';
		  }
		 ?>        	
                              href="cart"><i class="fa fa-shopping-cart"></i> Cart
                                 
                                 <?php
                                 $getData = $cart->checkcartRow();
                                   if ($getData) {
                                        $sum = Session::get("sum");
                                        $count = Session::get("count");
                                       if ($sum){
                                      	echo "$".$sum." - ".$count." item";
                                     }
                                   }else{
                                   	echo "(empty)";
                                   	 }
                                 ?>
                              </a></li> 
                             <li><a
        <?php 
		  if ($current_page == 'profile')
		  	{ echo 'id="active"';
		  }
		 ?>   
                              href="profile"><i class="fa fa-user"></i> Account</a></li>
							 <li><a href="?userid=<?php echo Session::get("userId"); ?>"><i class="fa fa-lock"></i> Logout</a></li>
							  

							 <?php } else { ?>
							  <li><a 
		<?php 
		  if ($current_page == 'login')
		  	{ echo 'id="active"';
		  }
		 ?> 
		  href="login"><i class="fa fa-crosshairs"></i> Register</a></li>
                              <li><a href="login"><i class="fa fa-lock"></i> Login</a></li>
                              <?php } ?>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

<div class="mainmenu pull-left">
<ul class="nav navbar-nav collapse navbar-collapse">
	<li><a 
		<?php 
		  if ($current_page == 'index')
		  	{ echo 'id="active"';
		  }
		  ?> 
	     href="index">Home</a></li>
 
	<li><a 
		 <?php 
		  if ($current_page == 'shop')
		  	{ echo 'id="active"';
		  }
		  ?> 
		href="shop">Shop</a></li> 

	<li><a  
		<?php 
		  if ($current_page == 'blog')
		  	{ echo 'id="active"';
		  }
		  ?> 

      href="blog">Blog</a></li> 

	<li><a
      <?php 
		  if ($current_page == 'contact')
		  	{ echo 'id="active"';
		  }
	   ?> 
	 href="contact">Contact</a></li>
</ul>
</div>
</div>
		<div class="col-sm-3">
			   <div class="search">
				    <form action="search.php" method="get">
				    	<input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for products';}" name="search">
				    	<input type="submit" value="SEARCH">
				    </form>
			    </div>
		</div>

				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<style type="text/css">
		.search{
	float:left;
	border: 1px solid #DBDBDB;
	position:relative;
	width:100%;
}
.search input[type="text"]{
	width:74%;
	padding:9px 8px;
	outline:none;
	border:none;
	background:none;
	font-size:14px;
	color:#a5a5a5;
	font-family:Arial;
	outline:none;
	margin:0;
}
.search input[type="submit"]{
	border:none;
	cursor:pointer;
	color:#FFF;
	font-size:12px;
	padding:10px 15px;
	height: 36px;
	margin:0;
	background: -webkit-gradient(linear,left top,left bottom,from(#70389C),to(#602D8D));
	background: -moz-linear-gradient(top,#70389C,#602D8D);
	background: -o-linear-gradient(top,#70389C,#602D8D);
	background: -ms-linear-gradient(top,#70389C,#602D8D);
	-webkit-transition: all .9s;
	-moz-transition: all .9s;
	-o-transition: all .9s;
	-ms-transition: all .9s;
	transition: all .9s;
	position:absolute;
	right:0;
	top:0;
  }
}
	</style>