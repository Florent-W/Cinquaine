<?php 

	require_once("controller/HomeController.php"); // File don't exist yet 

	if(isset($_GET['action'])) {
		$action = $_GET['action'];
	}
	else {
		$action = ''; // Put default action here
	}
?>
