<?php
	
	require("dbConnection.php");
	//var_dump($_POST);
	session_start();
	$user_id = $_SESSION['user_id'];
	$store_name = mysqli_real_escape_string($conn, $_POST["storename"]);
	$store_location = mysqli_real_escape_string($conn, $_POST["storelocation"]);
	$store_description = mysqli_real_escape_string($conn, $_POST["storedescription"]);
	$query = "INSERT INTO `cloth_store` (`store_name`, `store_location`, `store_description`,`user_id`) VALUES ('$store_name', '$store_location', '$store_description', '$user_id');";
		
	//echo $query . "\n";
	
	if(mysqli_query($conn, $query)){
		$_SESSION['id'] = mysqli_insert_id($conn);
		
		header('Location: cs-homepage.php');
	}
	

?>