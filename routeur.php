<?php 

	require_once("controller/controllerHome.php");

	if(isset($_GET['action'])) {
		$action = $_GET['action'];
	}
	else {
		$action = 'displayHome';
	}

	try {
		ControllerHome::$action();
	}
	catch(string $e) {
		echo $e;
	}
?>
