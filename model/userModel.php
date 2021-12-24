<?php

require_once "conf/Connexion.php";
Connexion::connect();

class User {
    private $name;
    private $password;
    private $balance;

    // Getter d'un utilisateur
	public function getName() {return $this->name;}
	public function getPassword() {return $this->password;}
    public function getBalance() {return $this->balance;}

    // Setter d'un service
	public function setName($name) {$this->name = $name;}
    public function setPassword($password) {$this->password = $password;}
    public function setBalance($balance) {$this->balance = $balance;}

    // Constructeur d'un utilisateur
    public function __construct($name = NULL, $password = NULL, $balance = NULL) {
        if(!is_null($name) && (!is_null($password) && (!is_null($balance)))) {
            $this->name = $name;
            $this->password = $password;
            $this->balance = $balance;
        }
    }

    public static function getUser($id) {
        $query = "SELECT id, name, password, balance FROM users WHERE id = :id";
        $p_query = Connexion::getPdo()->prepare($query);
        $result = [];
        try {
            $p_query->setFetchMode(PDO::FETCH_CLASS, 'User');
            $p_query->execute(array("id" => $id));
            $result = $p_query->fetch();
        } catch (PDOException $e) {
            $result["error"] = $e->getMessage();
        }
        return $result;
    }

    public static function getAllUsers() {
        $query = "SELECT id, name, password, balance from users";
        $p_query = Connexion::getPdo()->prepare($query);
        $result = [];
        try {
            $p_query->setFetchMode(PDO::FETCH_CLASS, 'User');
            $p_query->execute();
            $result = $p_query->fetchAll(); 
        } catch (PDOException $e) {
            $result["error"] = $e->getMessage();
        }
        return $result;
    }

}