<?php

require_once "conf/Connexion.php";
Connexion::connect();

class User {
    private $id;
    private $name;
    private $password;
    private $email;
    private $phone_number;
    private $balance;

    // Getter of a user
    public function getId() {return $this->id;}
	public function getName() {return $this->name;}
	public function getPassword() {return $this->password;}
    public function getEmail() {return $this->email;}
    public function getTelephoneNumber() {return $this->phone_number;}
    public function getBalance() {return $this->balance;}

    // Setter of a user
    public function setId($id) {$this->id = $id;}
	public function setName($name) {$this->name = $name;}
    public function setPassword($password) {$this->password = $password;}
    public function setEmail($email) {$this->email = $email;}
    public function setTelephoneNumber($phone_number) {$this->phone_number = $phone_number;}
    public function setBalance($balance) {$this->balance = $balance;}

    // Constructor of a user
    public function __construct($id = NULL, $name = NULL, $password = NULL, $email = NULL, $phone_number = NULL, $balance = NULL) {
        if(!is_null($id) && !is_null($name) && !is_null($password) && !is_null($email) && !is_null($phone_number) && !is_null($balance)) {
            $this->id = $id;
            $this->name = $name;
            $this->password = $password;
            $this->email = $email;
            $this->phone_number = $phone_number;
            $this->balance = $balance;
        }
    }

    public static function getUser($id) {
        $query = "SELECT id, name, password, email, phone_number, balance FROM users WHERE id = :id";
        $p_query = Connexion::pdo()->prepare($query);
        $values = array("id" => $id);
        $result = [];
        try {
            $p_query->setFetchMode(PDO::FETCH_CLASS, 'User');
            $p_query->execute($values);
            $result = $p_query->fetch();
        } catch (PDOException $e) {
            $result["error"] = $e->getMessage();
        }
        return $result;
    }

    public static function getAllUsers() {
        $query = "SELECT id, name, password, email, phone_number, balance from users";
        $p_query = Connexion::pdo()->prepare($query);
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

    public static function addUser($name, $password, $email, $phone_number, $balance) {
        $query = "INSERT INTO users (name, password, email, phone_number, balance) VALUES (:name, :password, :email, :phone_number, :balance)";
        $p_query = Connexion::pdo()->prepare($query);
        // Need to add a hash for the password
		$values = array(
			"name" => $name,
			"password" => $password,
			"email" => $email,
            "phone_number" => $phone_number,
            "balance" => $balance
		);
		try {
			$p_query->execute($values);
			return true;
		} catch (PDOException $e) {
			echo "erreur : ".$e->getMessage()."<br>";
			return false;
		}
    }

    public static function deleteUserById($id) {
		$query = "DELETE FROM users WHERE id = :id;";
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

    public static function updateUser($id, $name, $password, $email, $phone_number, $balance) {
		$query = "UPDATE users SET name = :name, password = :password, email = :email, phone_number = :phone_number, balance = :balance WHERE id = :id;";
		$p_query = Connexion::pdo()->prepare($query);
		$values = array(
			"id" => $id,
            "name" => $name,
			"password" => $password,
			"email" => $email,
            "phone_number" => $phone_number,
            "balance" => $balance
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