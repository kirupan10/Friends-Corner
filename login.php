<!DOCTYPE html>
<?php
session_start();
error_reporting(0);
include('includes/config.php');
// Code user Registration
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$password=$_POST['password'];
$saddress=$_POST['shippingAddress'];
$sstate=$_POST['shippingState'];
$scity=$_POST['shippingCity'];
$spincode=$_POST['shippingPincode'];
$baddress=$_POST['billingAddress'];
$bstate=$_POST['billingState'];
$bcity=$_POST['billingCity'];
$bpincode=$_POST['billingPincode'];
$query=mysqli_query($con,"insert IGNORE   into users(name,email,contactno,password,shippingAddress,shippingState,
shippingCity,shippingPincode,billingAddress,billingState,billingCity,billingPincode) values ('$name','$email',
'$contactno','$password','$saddress','$sstate','$scity','$spincode','$baddress','$bstate','$bcity','$bpincode')");
if($query)
{
	
	$email=$_POST['email'];
   $password=$_POST['password'];
$query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0){
$extra="cart.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['email']=$num['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();

}else{
$extra="login.php";
$email=$_POST['email'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Invalid email id or Password";
exit();
}
}
else{
echo $name;
echo $email;
echo $contactno;
echo $password;
echo $saddress;
echo $sstate;
echo $scity;
echo $spincode;
echo $baddress;
echo $bstate;
echo $bcity;
echo $bpincode;
echo("Error description: " . mysqli_error($con));

}
}
// Code for User login
if(isset($_POST['login']))
{
   $email=$_POST['email'];
   $password=$_POST['password'];
$query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="cart.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['email']=$num['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$extra="login.php";
$email=$_POST['email'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
$log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Invalid email id or Password";
exit();
}
}


?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +94 123 456 7890</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> contact@Eshopper.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="http://www.facebook.com/kirupanoffcl"><i class="fa fa-facebook"></i></a></li>
								<li><a href="http://www.twitter.com/kirupanoffcl"><i class="fa fa-twitter"></i></a></li>
								<li><a href="http://www.linkedin.com/kirupanoffcl"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="http://www.dribbble.com/kirupanoffcl"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="http://www.googleplus.com/kirupanoffcl"><i class="fa fa-google-plus"></i></a></li>
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
							<a href="/eshopper"><img src="images/home/logo.png" alt="" /></a>
						</div>
						<form action="search" method="POST">
						<div class="search_box pull-right">
							<input type="text" name="search" placeholder=""/>
							
						</div>
						</form>
						
						
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="profile"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="wishlist"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="login" class="active"><i class="fa fa-lock"></i> Login</a></li>
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
						
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="" method = "POST">
							<input type="text" name="email" placeholder="Email Address" />
							<input type="password" name="password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" name="login" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="" method="POST">
							<input type="text" name="fullname" placeholder="Name"/>
							<input type="text" name="email" placeholder="Email Address"/>
							<input type="text" name="contactno" placeholder="Contact Number"/>
							
							<input type="text" name="shippingAddress" placeholder="Shipping Address"/>
							<input type="text" name="shippingState" placeholder="Shipping State"/>
							<input type="text" name="shippingCity" placeholder="Shipping City"/>
							
							<input type="text" name="shippingPincode" placeholder="Shipping Pincode"/>
							<input type="text" name="billingAddress" placeholder="Billing Address"/>
							<input type="text" name="billingState" placeholder="Billing State"/>
							
							<input type="text" name="billingCity" placeholder="Billing City"/>
							<input type="text" name="billingPincode" placeholder="Billing Pincode"/>
							<input type="password" name="password" placeholder="Password"/>
							<input type="submit" class="btn btn-primary" name="submit" value="Submit">
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
<?php include('includes/footer.php'); ?>
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>