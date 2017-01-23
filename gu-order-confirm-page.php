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
	
	//var_dump($_POST);
	if(isset($_POST["tailor_name"])){
		$tailor_name = mysqli_real_escape_string($conn, $_POST["tailor_name"]);
							
		$name = mysqli_real_escape_string($conn, $_POST["name"]);
		$address = mysqli_real_escape_string($conn, $_POST["address"]);
		$phone_no = mysqli_real_escape_string($conn, $_POST["phone_no"]);
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		$store_id = mysqli_real_escape_string($conn, $_GET["store_id"]);
		$fabric_id = mysqli_real_escape_string($conn, $_GET["fabric_id"]);
		if(isset($_POST["id"])){
			$mes_id = mysqli_real_escape_string($conn, $_POST["id"]);
		}
		else if(isset($_POST["length"])){
			$length = mysqli_real_escape_string($conn, $_POST["length"]);
			$chest = mysqli_real_escape_string($conn, $_POST["chest"]);
			$waist = mysqli_real_escape_string($conn, $_POST["waist"]);
			$shoulder = mysqli_real_escape_string($conn, $_POST["shoulder"]);
			$neck = mysqli_real_escape_string($conn, $_POST["neck"]);
			$sleeve = mysqli_real_escape_string($conn, $_POST["sleeve"]);
			$arm_hole = mysqli_real_escape_string($conn, $_POST["arm_hole"]);
			
			
			
			$query = "INSERT INTO `measurement_data` (`length`, `chest`, `waist`, `shoulder`, `neck`, `sleeve`, `arm_hole`) 
			VALUES ('$length', '$chest', '$waist', '$shoulder', '$neck', '$sleeve', '$arm_hole');";
				
			//echo $query . "\n";
			
			if(mysqli_query($conn, $query)){
				//header('Location: ru-measurementprofile.php');
				$mes_id = mysqli_insert_id($conn);
			}
		}
			$query = "INSERT INTO `order_info` (`order_id`, `name`, `address`, `phone_no`, `email`, `data_id`, `store_id`, `tailor_id`, `fabric_id`) 
			VALUES (NULL, '$name', '$address', '$phone_no', '$email', '$mes_id', '$store_id', '$tailor_name', '$fabric_id');";
			
			////echo $query;
			if(mysqli_query($conn, $query)){
				header('Location: gu-pending-for-approval.php');
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
		    <div class="signin">
    <div class="container">
        <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-2 col-sm-8 col-sm-offset-2 col-xs-offset-0 col-xs-12 col-xs-offset-0">
			<div class="signin-main">
                <h3>Please Select a Tailor</h3>
                <form action="" method="post">
				<select class="form-control option-select" id="tailor_name" name="tailor_name">
				<?php
				$query1 = "SELECT `tailor_name`, tailor_id FROM `tailor_store`";
				$result = mysqli_query($conn, $query1);
				while($row1 = mysqli_fetch_assoc($result)){
					?>
						
                        <option value="<?php echo $row1["tailor_id"]?>"><?php echo $row1["tailor_name"]?></option>
                    
				}
				<?php } ?>
				</select>
                    
					<h3>Provide Order Information</h3>
					<input type="text" name="name" id="name" placeholder="Name">
					<input type="text" name="address" id="address" placeholder="Address">
					<input type="text" name="phone_no" id="phone_no" placeholder="Phone No">
					<input type="text" name="email" id="email" placeholder="Email">
					
                    <h3>Provide Measurement Data</h3>
                    <input type="text" name="length" id="length" placeholder="Length">
					<input type="text" name="chest" id="chest" placeholder="Chest">
					<input type="text" name="waist" id="waist" placeholder="Waist">
					<input type="text" name="shoulder" id="shoulder" placeholder="Shoulder">
					<input type="text" name="neck" id="neck" placeholder="Neck">
					<input type="text" name="sleeve" id="sleeve" placeholder="Sleeve">
                    <input type="text" name="arm_hole" id="arm_hole" placeholder="arm_hole">	
					<input type="submit" value="Submit">
				</form>
            </div>  
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
		      <p>© 2016 eOutfitter. All Rights Reserved </p>
		  </div>
		</div>
	</div>
</div>
<!--footer end here-->
</body>
</html>