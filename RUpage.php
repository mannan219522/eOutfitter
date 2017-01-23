<?php
	
	require("dbConnection.php");
	//var_dump($_POST);
	session_start();
	$user_id = $_SESSION['user_id'];
	$firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
	$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
	$sex = mysqli_real_escape_string($conn, $_POST["sex-type"]);
	$age = mysqli_real_escape_string($conn, $_POST["age"]);
	$query = "INSERT INTO `registered_user` (`first_name`, `last_name`, `sex`, `age`, `user_id`) VALUES ('$firstname', '$lastname', '$sex', '$age', '$user_id');";

	
	if(mysqli_query($conn, $query)){
		$_SESSION['id'] = mysqli_insert_id($conn);
		
		header('Location: ru-fabric-choose-page.php');
	}
	

?>