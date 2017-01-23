<?php
	session_start();			
	if(!isset($_SESSION['$season-user']))
	{
		header('Location: index.php');
	}
	else if($_SESSION['type_id']!=3){
		header('Location: signin.php');
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
	
	$id = $_GET['id'];
	
	$query = "SELECT oi.order_id as id, oi.name as name, oi.address as address, oi.phone_no as phone, oi.email as email, cs.store_name as store_name, u.email as cs_email, u.phone_no as cs_phone, md.cloth_type as cloth_type, md.length as length, md.chest as chest, md.waist as waist, md.shoulder as shoulder, md.neck as neck, md.sleeve as sleeve, md.arm_hole as arm_hole 
	FROM order_info as oi, cloth_store as cs, tailor_store as ts, measurement_data as md, user as u 
	WHERE oi.store_id=cs.user_id AND oi.tailor_id=ts.tailor_id AND oi.data_id = md.id and u.user_id=cs.user_id and oi.order_id = $id";
	
	//echo $query;
	
	$result = mysqli_query($conn, $query);
	
	$no_of_result = mysqli_affected_rows($conn);
	$row = mysqli_fetch_assoc($result);
	//var_dump($row);
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
								<a href="ts-homepage.php">eOutfitter</a>
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
		                <li class="dropdown">
                        <a class=" scroll" data-toggle="dropdown" href="#">Measurement Profile</a>
                        <ul class="dropdown-menu hudai">
                            <li><a href="ts-measurementprofile.php">Add New</a></li>
                            <li><a href="ts-measurementprofile-view-old.php">View Old</a></li>
                        </ul>
                    </li>
						<li><a href="ts-approved.php">Approved List</a></li>
		                <li><a href="signout.php">Sign Out</a></li>
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
        <div class="banner-main ts-order-details">
            <ul>
				<li>Order Id: <?php echo $row["id"] ?></li>
                <li>Cloth Store Name: <?php echo $row["store_name"] ?></li>
				<li>Phone(Cloth Store): <?php echo $row["cs_phone"] ?></li>
				<li>Email: <?php echo $row["cs_email"] ?></li>
                <li>Cloth Type <?php echo $row["cloth_type"] ?></li>
                <li>Length: <?php echo $row["length"] ?></li>
                <li>Chest:<?php echo $row["chest"] ?></li>
                <li>Weist: <?php echo $row["waist"] ?></li>
                <li>Shoulder: <?php echo $row["shoulder"] ?></li>
                <li>Neck: <?php echo $row["neck"] ?></li>
                <li>Sleeve: <?php echo $row["sleeve"] ?></li>
                <li>Arm Hole: <?php echo $row["arm_hole"] ?></li>
                <li>Customer Name: <?php echo $row["name"] ?></li>
                <li>Phone Number: <?php echo $row["phone"] ?></li>
                <li>Email Address: <?php echo $row["email"] ?></li>
                <li>Delivery Location: <?php echo $row["address"] ?></li>
            </ul>
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




