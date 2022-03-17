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
	<link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/css/nav.css" rel="stylesheet" />
</head>
<body>
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
</body>
</html>
