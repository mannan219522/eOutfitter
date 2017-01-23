<?php
	$server = "localhost";
	$user = "root";
	$password = "";
	$dbname = "eoutfitter";
	
	$conn = mysqli_connect($server, $user, $password, $dbname);
	
	if(mysqli_connect_errno()){
		echo "connection error\n";
	}
?>