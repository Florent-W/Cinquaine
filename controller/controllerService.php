<?php 
require_once("./model/serviceModel.php");
require_once("./model/typeServiceModel.php");
require_once("./model/userModel.php");

require_once("./controller/controllerHome.php");

class ControllerService {

	public static function displayServices() {
		/* Replace this by the list services page */
		$services = Service::getAllServices();
		require_once("view/Navbar.php");
		require("view/Homepage.php");
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
        ControllerHome::displayProfile();
	}

	public static function createService() {
		$services = Service::getAllServices();
		$types_service = TypeService::getAllTypesServices();
		$users = User::getAllUsers();
		require_once("view/Navbar.php");
		require("view/createService.php");
		require_once("view/Footer.php");
	}

	public static function createdService() {
        if(!empty($_POST['dateStart']) && !empty($_POST['dateEnd']) && !empty($_POST['idTypeService']) && !empty($_POST['price']) && !empty($_SESSION['id']) && !empty($_POST['title']) && !empty($_POST['description'])) {
			$dateStart = date("Y-m-d H:i:s", strtotime($_POST['dateStart']));
			$dateEnd = date("Y-m-d H:i:s", strtotime($_POST['dateEnd']));
			$idTypeService = $_POST['idTypeService'];
			$price = $_POST['price'];
			$idUser = $_SESSION['id'];
			$title = $_POST['title'];
            $description = $_POST['description'];

            Service::addService($dateStart, $dateEnd, $idTypeService, $price, $idUser, $title, $description);
		}
        ControllerHome::displayProfile();
	}

	public static function updateService() {
		$id = $_GET["id"];
		$service = Service::getService($id);
		require("view/update.php"); 
	}

    public static function buyService() {
      if(!empty($_GET['id']) && $_SESSION['id']) {
            $id_service = $_GET['id'];
            $id_user = $_SESSION['id'];

            $user = User::getUserById($id_user);
            $balance = $user->getBalance();

            $service = Service::getService($id_service);
            $price_service = $service->getPrice();

            if($balance >= $price_service) {
                User::decreaseBalance($id_user, $price_service);
                $balance = $user->getBalance();

                $id_seller = $service->getIdUser();
                $seller = User::getUserById($id_seller);

                $balance_seller = $seller->getBalance();

                User::increaseBalance($id_seller, $price_service);

                Service::addBuyer($id_service, $id_user);

				ControllerHome::displayHome();
            }
            else {
                echo 'Vous n\'avez pas assez d\'argent pour acheter ce service';
            }
            ControllerHome::displayHome();
      }
        else {
            echo 'Vous n\'êtes pas connecté et/ou ce service n\'existe pas.';
        }
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

	public static function browseServices() {
        $services = Service::getAllServices();

		require_once("view/Navbar.php");
		require_once("view/BrowseServices.php");
	}
}
?>