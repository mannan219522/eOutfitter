<?php
session_start();

if (isset($_SESSION['type_id'])){
	if($_SESSION['type_id']= 1){
		header('Location: ru-fabric-choose-page.php');
	}
	elseif($_SESSION['type_id']= 2){
		header('Location: cs-homepage.php');
	}
	elseif($_SESSION['type_id']= 3){
		header('Location: ts-homepage.php');
	}
	
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>eOutfitter</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoplist Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Hind:400,500,300,600,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
	    jQuery(document).ready(function ($) {
	        $(".scroll").click(function (event) {
	            event.preventDefault();
	            $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
	        });
	    });
	</script>
<!-- //end-smoth-scrolling -->
<script src="js/simpleCart.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php
	
	require("dbConnection.php");
	
	if(isset($_POST['username'])){
	
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$enc_pass = SHA1($password."mannan");
	
		$query = "SELECT * FROM `user` WHERE user_name= '$username' and password= '$enc_pass'";
		//echo $query;
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
	//var_dump($row);
	if($row['username'] = $username && $row['password'] == $enc_pass){
		
		$_SESSION['$season-user'] = $username;
		$_SESSION['user_id'] = $row["user_id"];
		$_SESSION['type_id'] = $row["type_id"];
		
		if($row["type_id"]==1){
			
			$query = "SELECT * FROM `registered_user` WHERE user_id='".$row["user_id"]."'";
	
			$result = mysqli_query($conn, $query);
			$row1 = mysqli_fetch_array($result);
			//var_dump($row1);
			$_SESSION['id'] = $row1["ru_id"];
			
			
			
			header('Location: ru-fabric-choose-page.php');
		}
		elseif($row["type_id"]==2){
			
			$query = "SELECT * FROM `cloth_store` WHERE user_id='".$row["user_id"]."'";
			
			$result = mysqli_query($conn, $query);
			$row1 = mysqli_fetch_array($result);
			//var_dump($row1);
			$_SESSION['id'] = $row1["store_id"];
			
			header('Location: cs-homepage.php');
		}
		elseif($row["type_id"]==3){
			
			$query = "SELECT * FROM `tailor_store` WHERE user_id='".$row["user_id"]."'";
			
			$result = mysqli_query($conn, $query);
			$row1 = mysqli_fetch_array($result);
			var_dump($row1);
			$_SESSION['id'] = $row1["tailor_id"];
			$_SESSION['ty_id'] = $row2["type_id"];
			
			//echo $_SESSION['id'];
			header('Location: ts-homepage.php');
			
		}
		elseif($row["type_id"]==4){
			
			header('Location: admin-homepage.php');
		}
	}
	else{
		echo "failed to log n";
	}	
		
	}	
	
?>
<!--header strat here-->
<div class="header">
	<div class="container">
		<div class="header-main">
			<div class="top-nav">
				<div class="content white">
	              <nav class="navbar navbar-default" role="navigation">
					    <div class="navbar-header">
					        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
					        </button>
					        <div class="navbar-brand logo">
								<a href="index.php">eOutfitter</a>
							</div>
					    </div>
					    <!--/.navbar-header-->
					 
					    <!--/.navbar-collapse-->
					</nav>
					<!--/.navbar-->
				</div>
			</div>
		    <div class="header-right">
		        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		            <ul class="nav navbar-nav">
		                <li><a href="gu-fabric-choose-page.php">Design & Order</a></li>
		                <li><a href="signup.html">Measurement Profile</a></li>
		                <li><a href="signin.php">Sign In</a></li>
		                <li><a href="signup.html">Sign Up</a></li>
		            </ul>
		        </div>
		    </div>
		 <div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--header end here-->
<!--banner strat here-->
<div class="banner">
	<div class="container">
		<div class="banner-main">
		    <div class="login">
		        <div class="container">
		            <div class="login-main">
		                <h1>Login</h1>
		                <div class="col-md-6 login-left">
		                    <form action="signin.php" method="post">
		                        <input type="text" id="username" name="username" placeholder="Username" required="">
		                        <input type="password" id="password" name="password" placeholder="Password" required="">
		                        <input type="submit" value="Login">
		                    </form>
		                </div>
		                <div class="col-md-6 login-right">
		                    <h3>New User?</h3>
		                    <p>Want to Create an Account?</p>
		                    <a href="signup.html" class="login-btn">Create an Account </a>
		                </div>
		                <div class="clearfix"> </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
<!--banner end here-->
<!--footer strat here-->
<div class="footer">
	<div class="container">
		<div class="footer-main">
			<div class="ftr-grids-block">
				<div class="col-md-4 footer-grid">
					<ul>
					    <li><a href="about-us.html">About Us</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
					    <li><a href="terms.html">Terms and Condition</a></li>
					</ul>
				</div>
				<div class="col-md-4 footer-grid-icon">
					<form>
					<input class="email-ftr" type="text" value="Newsletter" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Newsletter';}">
					<input type="submit" value="Submit"> 
					</form>
				</div>
				<div class="col-md-4 footer-grid-icon">
					<ul>
						<li><a href="#"><span class="u-tub"> </span></a></li>
						<li><a href="#"><span class="instro"> </span></a></li>
						<li><a href="#"><span class="twitter"> </span></a></li>
						<li><a href="#"><span class="fb"> </span></a></li>
						<li><a href="#"><span class="print"> </span></a></li>
					</ul>
				</div>
		    <div class="clearfix"> </div>
		  </div>
		  <div class="copy-rights">
		      <p>© 2016 Pustokbd. All Rights Reserved </p>
		  </div>
		</div>
	</div>
</div>
<!--footer end here-->
</body>
</html>