<?php
require_once("./model/serviceModel.php");

class ControllerHome
{

	public static function displayHome()
	{
		$services = Service::getAllServices();
		require_once("view/Navbar.php");
		require_once("view/SearchForm.php");
		require_once("view/Homepage.php");
		require_once("view/Footer.php");
	}

	public static function displayProfile()
	{
		$services = Service::getAllServicesFromUser($_SESSION["id"]);
		require_once("view/Navbar.php");
		require_once("view/Profile.php");
		require_once("view/Footer.php");
	}

	public static function displaySettings()
	{
		require_once("view/Navbar.php");
		require_once("view/Settings.php");
		require_once("view/Footer.php");
	}

	public static function displayIncreaseBalance() 
	{
		require_once("view/Navbar.php");
		require_once("view/IncreaseBalance.php");
		require_once("view/Footer.php");
	}

	public static function displayCreditCardPayment() 
	{
		require_once("view/Navbar.php");
		require_once("view/CCPayment.php");
		require_once("view/Footer.php");
	}

	public static function increaseBalanceDone()
	{
		if(!empty($_SESSION['id']) && !empty($_GET['offer'])){
			$id  = $_SESSION['id'];
			$valbundle = $_GET['offer'];
			User::increaseBalance($id, $valbundle);
			require_once("view/Navbar.php");
			require_once("view/Homepage.php");
			require_once("view/Footer.php");
		}
		else {
			require_once("view/Navbar.php");
			echo "Echec de la transaction";
			require_once("view/IncreaseBalance.php");
			require_once("view/Footer.php");
		}
	}
}
