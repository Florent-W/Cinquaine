<?php

require_once "conf/Connexion.php";
Connexion::connect();

class TypeService {
    private $id_type_service;
    private $name;

    // Getter of a type service
    public function getId() {return $this->id_type_service;}
	public function getName() {return $this->name;}

    // Setter of a type service
    public function setId($id_type_service) {$this->id_type_service = $id_type_service;}
	public function setName($name) {$this->name = $name;}

    // Constructor of a type service
    public function __construct($id_type_service = NULL, $name = NULL) {
        if(!is_null($id_type_service) && !is_null($name)) {
            $this->id_type_service = $id_type_service;
            $this->name = $name;
        }
    }

    public static function getTypeService($id_type_service) {
        $query = "SELECT id_type_service, name FROM types_services WHERE id_type_service = :id_type_service";
        $p_query = Connexion::pdo()->prepare($query);
        $values = array("id_type_service" => $id_type_service);
        $result = [];
        try {
            $p_query->setFetchMode(PDO::FETCH_CLASS, 'TypeService');
            $p_query->execute($values);
            $result = $p_query->fetch();
        } catch (PDOException $e) {
            $result["error"] = $e->getMessage();
        }
        return $result;
    }

    public static function getAllTypesServices() {
        $query = "SELECT id_type_service, name FROM types_services";
        $p_query = Connexion::pdo()->prepare($query);
        $result = [];
        try {
            $p_query->setFetchMode(PDO::FETCH_CLASS, 'TypeService');
            $p_query->execute();
            $result = $p_query->fetchAll();
        } catch (PDOException $e) {
            $result["error"] = $e->getMessage();
        }
        return $result;
    }

    public static function addTypeService($name) {
        $query = "INSERT INTO types_services (name) VALUES (:name)";
        $p_query = Connexion::pdo()->prepare($query);
		$values = array(
			"name" => $name,
		);
		try {
			$p_query->execute($values);
			return true;
		} catch (PDOException $e) {
			echo "erreur : ".$e->getMessage()."<br>";
			return false;
		}
    }

    public static function deleteTypeServiceById($id_type_service) {
		$query = "DELETE FROM types_services WHERE id_type_service = :id_type_service";
		$req_prep = Connexion::pdo()->prepare($query);
		$values = array("id_type_service" => $id_type_service);
		try {
			$req_prep->execute($values);
			return true;
		} catch (PDOException $e) {
			echo "erreur : ".$e->getMessage()."<br>";
		}
		return false;
	}

    public static function updateTypeService($id_type_service, $name) {
		$query = "UPDATE types_services SET name = :name WHERE id_type_service = :id_type_service";
		$p_query = Connexion::pdo()->prepare($query);
        $values = array(
            "id_type_service" => $id_type_service,
			"name" => $name,
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