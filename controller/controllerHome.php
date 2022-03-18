<?php
require_once("./model/serviceModel.php");

class ControllerHome
{

	public static function displayHome()
	{
		$services = Service::getAllServices();
		require_once("view/Navbar.php");
		require_once("view/Homepage.php");
	}

	public static function displayProfile()
	{
		//TODO
		//$services = Service::getAllServicesById();
		require_once("view/Navbar.php");
		require_once("view/Profile.php");
	}

	public static function displaySettings()
	{
		require_once("view/Navbar.php");
		require_once("view/Settings.php");
	}

	public static function displayLogin()
	{
		require_once("view/ConnectionForm.php");
	}
}
