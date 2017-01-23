<?php
	require("dbConnection.php");
	if(isset($_GET["approve"])){
		$query = "UPDATE `order_info` SET `cs_approve`= 1 WHERE `order_id`=".$_GET["approve"];
		if(mysqli_query($conn, $query)){
			header('Location: cs-approval-list.php');
		}
	}
	else if(isset($_GET["reject"])){
		$query = "Delete from `order_info` WHERE `order_id`=".$_GET["reject"];
		if(mysqli_query($conn, $query)){
			header('Location: cs-approval-list.php');
		}
	}

?>