<?php

require_once "conf/Connexion.php";
Connexion::connect();

class TypeService {
    private $id;
    private $name;

    // Getter of a type service
    public function getId() {return $this->id;}
	public function getName() {return $this->name;}

    // Setter of a type service
    public function setId($id) {$this->id = $id;}
	public function setName($name) {$this->name = $name;}

    // Constructor of a type service
    public function __construct($id = NULL, $name = NULL) {
        if(!is_null($id) && !is_null($name)) {
            $this->id = $id;
            $this->name = $name;
        }
    }

    public static function getTypeService($id) {
        $query = "SELECT id, name FROM types_services WHERE id = :id";
        $p_query = Connexion::pdo()->prepare($query);
        $values = array("id" => $id);
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
        $query = "SELECT id, name FROM types_services";
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

    public static function deleteTypeServiceById($id) {
		$query = "DELETE FROM types_services WHERE id = :id;";
		$req_prep = Connexion::pdo()->prepare($query);
		$values = array("id" => $id);
		try {
			$req_prep->execute($values);
			return true;
		} catch (PDOException $e) {
			echo "erreur : ".$e->getMessage()."<br>";
		}
		return false;
	}

    public static function updateTypeService($id, $name) {
		$query = "UPDATE types_services SET name = :name WHERE id = :id";
		$p_query = Connexion::pdo()->prepare($query);
        $values = array(
            "id" => $id,
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