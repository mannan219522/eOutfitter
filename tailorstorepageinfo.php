<?php
	
	session_start();
	require("dbConnection.php");
	//var_dump($_POST);
	
	$user_id = $_SESSION['user_id'];
	$tailor_name = mysqli_real_escape_string($conn, $_POST["tailorname"]);
	$tailor_location = mysqli_real_escape_string($conn, $_POST["tailorlocation"]);
	$tailor_description = mysqli_real_escape_string($conn, $_POST["tailordescription"]);
	$query = "INSERT INTO `tailor_store` (`tailor_name`, `tailor_location`, `tailor-description`, `user_id`) VALUES ('$tailor_name', '$tailor_location', '$tailor_description', '$user_id');";
		
	//echo $query . "\n";
	
	if(mysqli_query($conn, $query)){
		$_SESSION['id'] = mysqli_insert_id($conn);
		
		header('Location: ts-homepage.php');
	}
	

?>