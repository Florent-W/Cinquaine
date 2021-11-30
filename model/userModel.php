<?php

require_once __DIR__ . "/conf/Connexion.php";
Connexion::connect();

class User {

    private $name;
    private $balance;

    public function __construct($name, $balance) {
        $this->name = $name;
        $this->balance = balance;
    }

    public static function getUser($id) {
        $query = "select * from user where id_user = :id";
        $p_query = Connexion::getPdo()->prepare($query);
        $result = [];
        try {
            $result = $p_query->execute(array("id" => $id))->fetch();
        } catch (PDOException $e) {
            $result["error"] = $e->getMessage();
        }
        return $result;
    }

    public static function getAllUser() {
        $query = "select * from user";
        $p_query = Connexion::getPdo()->prepare($query);
        $result = [];
        try {
            $result = $p_query->execute()->fetchAll();
        } catch (PDOException $e) {
            $result["error"] = $e->getMessage();
        }
        return $result;
    }

}