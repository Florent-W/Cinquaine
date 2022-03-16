<?php 
require_once("./model/serviceModel.php");
require_once("./model/typeServiceModel.php");

class ControllerService {

	public static function displayServices() {
		/* Replace this by the list services page */
		$services = Service::getAllServices();
		require_once("view/Navbar.php");
		require("index.php");
	}

	public static function displayService() {
		$id = $_GET["id"];
		$service = Service::getService($id);
		// require("view/detail.php");
	}

	public static function deleteService() {
		// Need to control the rights of the user
		$id = $_GET["id"];
		Service::deleteServiceById($id);
		self::createService();
	}

	public static function createService() {
		$services = Service::getAllServices();
		$types_service = TypeService::getAllTypesServices();
		require_once("view/Navbar.php");
		require("view/createService.php");
	}

	public static function createdService() {
		if(!empty($_POST['dateStart']) && !empty($_POST['dateEnd']) && !empty($_POST['idTypeService']) && !empty($_POST['price']) && !empty($_POST['idUser']) && !empty($_POST['title'])) {
			$dateStart = date("Y-m-d H:i:s", strtotime($_POST['dateStart']));
			$dateEnd = date("Y-m-d H:i:s", strtotime($_POST['dateEnd']));
			$idTypeService = $_POST['idTypeService'];
			$price = $_POST['price'];
			$idUser = $_POST['idUser'];
			$title = $_POST['title'];
		
			Service::addService($dateStart, $dateEnd, $idTypeService, $price, $idUser, $title);
		}

		self::createService();
	}

	public static function updateService() {
		$id = $_GET["id"];
		$service = Service::getService($id);
		require("view/update.php"); 
	}

	public static function updatedService() {
		$id = $_GET["id"];
        $date_start = $_GET["date_start"];
		$date_end = $_GET["date_end"];
        $id_type_service = $_GET["id_type_service"];
		$price = $_GET["price"];
		$id_user = $_GET["id_user"];
        $title = $_GET["title"];

		Service::updateService($id, $date_start, $date_end, $id_type_service, $price, $title);
		self::createService();
	}
}
?>