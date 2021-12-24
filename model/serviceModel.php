<?php

require_once "conf/Connexion.php";
Connexion::connect();

class Service {
    private $id;
    private $date_start;
    private $date_end;
    private $id_type_service;
    private $price;
    private $id_user;
    private $title;

    // Getter d'un service
    public function getId() {return $this->id;}
	public function getDateStart() {return $this->date_start;}
	public function getDateEnd() {return $this->date_end;}
    public function getIdTypeService() {return $this->id_type_service;}
    public function getPrice() {return $this->price;}
	public function getIdUser() {return $this->id_user;}
    public function getTitle() {return $this->title;}

    // Setter d'un service
    public function setId($id) {$this->id = $id;}
	public function setDateStart($date_start) {$this->date_start = $date_start;}
    public function setDateEnd($date_end) {$this->date_end = $date_end;}
    public function setIdTypeService($id_type_service) {$this->id_type_service = $id_type_service;}
    public function setPrice($price) {$this->price = $price;}
    public function setIdUser($id_user) {$this->id_user = $id_user;}
    public function setTitle($title) {$this->title = $title;}

    // Constructeur d'un service
    public function __construct($id = NULL, $date_start = NULL, $date_end = NULL, $id_type_service = NULL, $price = NULL, $id_user = NULL, $title = NULL) {
        if(!is_null($id) && !is_null($date_start) && !is_null($date_end) && !is_null($id_type_service) && !is_null($price) && !is_null($id_user) && !is_null($title)) {
            $this->id = $id;
            $this->date_start = $date_start;
            $this->date_end = $date_end;
            $this->id_type_service = $id_type_service;
            $this->price = $price;
            $this->id_user = $id_user;
            $this->title = $title;
        }
    }

    public static function getService($id) {
        $query = "SELECT id, date_start, date_end, id_type_service, price, id_user, title FROM services WHERE id = :id";
        $p_query = Connexion::getPdo()->prepare($query);
        $result = [];
        try {
            $p_query->setFetchMode(PDO::FETCH_CLASS, 'Service');
            $p_query->execute(array("id" => $id));
            $result = $p_query->fetch();
        } catch (PDOException $e) {
            $result["error"] = $e->getMessage();
        }
        return $result;
    }

    public static function getAllServices() {
        $query = "SELECT id, date_start, date_end, id_type_service, price, id_user, title FROM services";
        $p_query = Connexion::getPdo()->prepare($query);
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

}