<?php
	session_start();
	
	require("dbConnection.php");
	//var_dump($_POST);
	$username = mysqli_real_escape_string($conn, $_POST["username"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$password = mysqli_real_escape_string($conn, $_POST["password"]);
	$enc_pass = SHA1($password."mannan");
	$phone = mysqli_real_escape_string($conn, $_POST["phone"]);
	$type = mysqli_real_escape_string($conn, $_POST["account-type"]);
	$query = "INSERT INTO `user` (`user_id`, `user_name`, `email`, `password`, `phone_no`, `type_id`) ".
		"VALUES (NULL, '$username', '$email', '$enc_pass', '$phone', '$type');";
		
	//echo $query . "\n";
	
	if(mysqli_query($conn, $query)){
		
		$_SESSION['$season-user'] = $username;
		$_SESSION['user_id'] = mysqli_insert_id($conn);
		$_SESSION['type_id'] = $type;
		if($type==1){
			header('Location: RUpage.html');
		}
		elseif($type==2){
			header('Location: clothstorepage.html');
		}
		elseif($type==3){
			header('Location: tailorstorepage.html');
		}
	}

?>