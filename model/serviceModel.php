<?php

require_once "conf/Connexion.php";
Connexion::connect();

class Service {
    private $id_service;
    private $date_start;
    private $date_end;
    private $id_type_service;
    private $price;
    private $id_user;
    private $title;
    private $description;

    // Getter of a service
    public function getId() {return $this->id_service;}
	public function getDateStart() {return $this->date_start;}
	public function getDateEnd() {return $this->date_end;}
    public function getIdTypeService() {return $this->id_type_service;}
    public function getPrice() {return $this->price;}
	public function getIdUser() {return $this->id_user;}
    public function getTitle() {return $this->title;}
    public function getDescription() {return $this->description;}

    // Setter of a service
    public function setId($id_service) {$this->id_service = $id_service;}
	public function setDateStart($date_start) {$this->date_start = $date_start;}
    public function setDateEnd($date_end) {$this->date_end = $date_end;}
    public function setIdTypeService($id_type_service) {$this->id_type_service = $id_type_service;}
    public function setPrice($price) {$this->price = $price;}
    public function setIdUser($id_user) {$this->id_user = $id_user;}
    public function setTitle($title) {$this->title = $title;}
    public function setDescription($description) {$this->description = $description;}

    // Constructor of a service
    public function __construct($id_service = NULL, $date_start = NULL, $date_end = NULL, $id_type_service = NULL, $price = NULL, $id_user = NULL, $title = NULL, $description = NULL) {
        if(!is_null($id_service) && !is_null($date_start) && !is_null($date_end) && !is_null($id_type_service) && !is_null($price) && !is_null($id_user) && !is_null($title) && !is_null($description)) {
            $this->id_service = $id_service;
            $this->date_start = $date_start;
            $this->date_end = $date_end;
            $this->id_type_service = $id_type_service;
            $this->price = $price;
            $this->id_user = $id_user;
            $this->title = $title;
            $this->description = $description;
        }
    }

    public static function getService($id_service) {
        $query = "SELECT id_service, date_start, date_end, id_type_service, price, id_user, title FROM services WHERE id_service = :id_service";
        $p_query = Connexion::pdo()->prepare($query);
        $values = array("id_service" => $id_service);
        $result = [];
        try {
            $p_query->setFetchMode(PDO::FETCH_CLASS, 'Service');
            $p_query->execute($values);
            $result = $p_query->fetch();
        } catch (PDOException $e) {
            $result["error"] = $e->getMessage();
        }
        return $result;
    }

    public static function getAllServicesFromUser($id_user) {
        $query = "SELECT id_service, date_start, date_end, id_type_service, price, id_user, title, description FROM services WHERE id_user = :id_user";
        $p_query = Connexion::pdo()->prepare($query);
        $values = array("id_user" => $id_user);
        $result = [];
        try {
            $p_query->setFetchMode(PDO::FETCH_CLASS, 'Service');
            $p_query->execute($values);
            $result = $p_query->fetchAll();
        } catch (PDOException $e) {
            $result["error"] = $e->getMessage();
        }
        return $result;
    }

    public static function getAllServicesFromUserAvailable($id_user) {
        $query = "SELECT id_service, date_start, date_end, id_type_service, price, id_user, title, description FROM services WHERE id_user = :id_user";
        $p_query = Connexion::pdo()->prepare($query);
        $values = array("id_user" => $id_user);
        $result = [];
        try {
            $p_query->setFetchMode(PDO::FETCH_CLASS, 'Service');
            $p_query->execute($values);
            $result = $p_query->fetchAll();
        } catch (PDOException $e) {
            $result["error"] = $e->getMessage();
        }
        return $result;
    }

    public static function getAllServices() {
        $query = "SELECT id_service, date_start, date_end, id_type_service, price, id_user, title, description FROM services";
        $p_query = Connexion::pdo()->prepare($query);
        $result = [];
        try {
            $p_query->setFetchMode(PDO::FETCH_CLASS, 'Service');
            $p_query->execute();
            $result = $p_query->fetchAll();
        } catch (PDOException $e) {
            $result["error"] = $e->getMessage();
        }
        return $result;
    }

    public static function addService($date_start, $date_end, $id_type_service, $price, $id_user, $title, $description) {
        $query = "INSERT INTO services (date_start, date_end, id_type_service, price, id_user, title, description) VALUES (:date_start, :date_end, :id_type_service, :price, :id_user, :title, :description)";
        $p_query = Connexion::pdo()->prepare($query);
		$values = array(
			"date_start" => $date_start,
			"date_end" => $date_end,
			"id_type_service" => $id_type_service,
            "price" => $price,
            "id_user" => $id_user,
            "title" => $title,
            "description" => $description
		);
		try {
			$p_query->execute($values);
			return true;
		} catch (PDOException $e) {
			echo "erreur : ".$e->getMessage()."<br>";
			return false;
		}
    }

    public static function buyService($id_service, $id_user) {
        $query = "INSERT INTO service_acheteurs (id_user, id_service) VALUES (:id_user, :id_service)";
        $p_query = Connexion::pdo()->prepare($query);
        $values = array(
            "id_service" => $id_service,
            "id_user" => $id_user
        );
        try {
            $p_query->execute($values);
            return true;
        } catch (PDOException $e) {
            echo "erreur : ".$e->getMessage()."<br>";
            return false;
        }
    }

    public static function deleteServiceById($id_service) {
		$query = "DELETE FROM services WHERE id_service = :id_service";
		$req_prep = Connexion::pdo()->prepare($query);
		$values = array("id_service" => $id_service);
		try {
			$req_prep->execute($values);
			return true;
		} catch (PDOException $e) {
			echo "erreur : ".$e->getMessage()."<br>";
		}
		return false;
	}

    public static function updateService($id_service, $date_start, $date_end, $id_type_service, $price, $id_user, $title, $description) {
		$query = "UPDATE services SET date_start = :date_start, date_end = :date_end, id_type_service = :id_type_service, price = :price, id_user = :id_user, title = :title, description = :description WHERE id_service = :id_service";
		$p_query = Connexion::pdo()->prepare($query);
        $values = array(
            "id_service" => $id_service,
			"date_start" => $date_start,
			"date_end" => $date_end,
			"id_type_service" => $id_type_service,
            "price" => $price,
            "id_user" => $id_user,
            "title" => $title
		);
		try {
			$p_query->execute($values);
			return true;
		} catch (PDOException $e) {
			echo "erreur : ".$e->getMessage()."<br>";
			return false;
		}
	}
}