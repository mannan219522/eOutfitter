<?php
	
	require("dbConnection.php");
	
	session_start();
	$id=$_SESSION['user_id'];
	
	//var_dump($_POST);
	
	$cloth_type = mysqli_real_escape_string($conn, $_POST["cloth_type"]);
	$length = mysqli_real_escape_string($conn, $_POST["length"]);
	$chest = mysqli_real_escape_string($conn, $_POST["chest"]);
	$waist = mysqli_real_escape_string($conn, $_POST["waist"]);
	$shoulder = mysqli_real_escape_string($conn, $_POST["shoulder"]);
	$neck = mysqli_real_escape_string($conn, $_POST["neck"]);
	$sleeve = mysqli_real_escape_string($conn, $_POST["sleeve"]);
	$arm_hole = mysqli_real_escape_string($conn, $_POST["arm_hole"]);
	$query = "INSERT INTO `measurement_data` (`cloth_type`, `length`, `chest`, `waist`, `shoulder`, `neck`, `sleeve`, `arm_hole` , `user_id`) 
	VALUES ('$cloth_type', '$length', '$chest', '$waist', '$shoulder', '$neck', '$sleeve', '$arm_hole', '$id');";
		
	echo $query . "\n";
	
	if(mysqli_query($conn, $query)){
		header('Location: cs-measurementprofile-view-old.php');
	}
	

?>