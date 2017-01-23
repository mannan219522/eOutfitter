<?php
	
	session_start();
	session_unset($_SESSION['$season-user']);
	
	if (session_destroy())
	{
		header("location: index.php");
	}
	
?>