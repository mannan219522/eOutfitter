<?php
	
	require("dbConnection.php");
	
	session_start();
	$id = $_SESSION['user_id'];
	 if(isset($_FILES['fabric_photo'])){
      $target_dir = "upload/";
		$target_file = $target_dir . basename($_FILES["fabric_photo"]["name"]);
      
      if (move_uploaded_file($_FILES["fabric_photo"]["tmp_name"], $target_file)) {
			$fabric_photo = $target_file;
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
   }
	//var_dump($_POST);
	$fabric_name = mysqli_real_escape_string($conn, $_POST["fabric_name"]);
	$fabric_type = mysqli_real_escape_string($conn, $_POST["fabric_type"]);
	$price = mysqli_real_escape_string($conn, $_POST["price"]);
	
	$query = "INSERT INTO `fabric` (`fabric_name`, `fabric_photo`, `fabric_type`, `price`,`user_id` ) VALUES ('$fabric_name', '$fabric_photo', '$fabric_type', '$price', '$id');";
		
	//echo $query . "\n";
	
	if(mysqli_query($conn, $query)){
		header('Location: cs-homepage.php');
	}
	

?>