<?php

	require_once("controller/controllerHome.php");
	require_once("controller/controllerLogin.php");
	require_once("controller/controllerService.php");

	if(isset($_GET['action'])) {
		$action = $_GET['action'];
	}
	else {
		$action = 'displayHome';
	}
	if(isset($_GET['controller'])) {
		$controller = $_GET['controller'];
	}
	else {
		$controller = 'controllerHome';
	}

	try {
		$controller::$action();
	}
	catch(string $e) {
		echo $e;
	}
?>
