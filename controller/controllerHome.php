<?php

class ControllerHome {

	public static function displayHome() {
		$services = Service::getAllServices();
		require_once("view/Navbar.php");
		require_once("index.php");
	}
}
