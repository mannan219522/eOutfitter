<?php
	session_start();			
	if(!isset($_SESSION['$season-user']))
	{
		header('Location: index.php');
	}
	else if($_SESSION['type_id']!=2){
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
	$cs_id = $_SESSION["user_id"];
	require("dbConnection.php");
	$query = "SELECT oi.order_id, f.fabric_name, ts.tailor_name, ts.tailor_location, oi.phone_no, oi.email ".
	"FROM cloth_store as cs, tailor_store as ts, order_info as oi, fabric as f ".
	"WHERE oi.store_id = cs.user_id and oi.tailor_id = ts.tailor_id and oi.fabric_id = f.fabric_id and oi.store_id = '$cs_id' and oi.cs_approve = 0";
	
	$result = mysqli_query($conn, $query);
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
								<a href="cs-homepage.php">eOutfitter</a>
							</div>
					    </div>
					    <!--/.navbar-header-->
					 
					    <!--/.navbar-collapse-->
					</nav>
					<!--/.navbar-->
				</div>
			</div>
		    <div class="header-right">
		        <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
		            <ul class="nav navbar-nav">
		                <li class="dropdown">
		                    <a class=" scroll" data-toggle="dropdown" href="#">Fabric Store</a>
		                    <ul class="dropdown-menu hudai">
		                        <li><a href="cs-fabricuploadpage.php">Upload New Fabric</a></li>
		                        <li><a href="cs-approval-list.php">Waiting for Approval</a></li>
								<li><a href="cs-approved.php">Approved</a></li>

		                    </ul>
		                </li>
		                <li class="dropdown">
		                    <a class=" scroll" data-toggle="dropdown" href="#">Measurement Profile</a>
		                    <ul class="dropdown-menu hudai">
		                        <li><a href="cs-measurementprofile.php">Add New</a></li>
		                        <li><a href="cs-measurementprofile-view-old.php">View Old</a></li>
		                    </ul>
		                </li>
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
	<?php while($row=mysqli_fetch_assoc($result)){ ?>
        <div class="banner-main cs-order-view">
            <ul>
                <li class="orderid"> Order Id: <?php echo $row["order_id"] ?></li>
                <li> Fabric Name: <?php echo $row["fabric_name"] ?></li>
                <li> Tailor Store Name: <?php echo $row["tailor_name"] ?></li>
                <li> Tailor Store Location: <?php echo $row["tailor_location"] ?></li>
				<p> #Customer Information:</p>
				<li> Phone No: <?php echo $row["phone_no"] ?></li>
				<li> Email: <?php echo $row["email"] ?></li>
                <li><a href="cs-approval.php?approve=<?php echo $row["order_id"] ?>"><button class="btn btn-default cs-order-view-button">Approve</button></a> </li>
                <li><a href="cs-approval.php?reject=<?php echo $row["order_id"] ?>"><button class="btn btn-default cs-order-view-button">Reject</button></a> </li>
            </ul>
            
            
        </div>
	<?php }?>
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

