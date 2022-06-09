<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cinquaine</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/css/bootstrap_5.1.3/bootstrap.min.css">
    <link href="assets/css/style.css" rel="stylesheet"/>
	<script src="js/bootstrap_5.1.3/bootstrap.bundle.min.js" defer></script>
</head>
<body>
<?php
    session_start();
	require_once("controller/controllerHome.php");
	require_once("controller/controllerSearch.php");
	require_once("controller/controllerLogin.php");
	require_once("controller/controllerService.php");
	require_once("controller/controllerSeeder.php");

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
</body>
</html>
