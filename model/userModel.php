<?php

require_once "conf/Connexion.php";
Connexion::connect();

class User
{
    private $id_user;
    private $name;
    private $password;
    private $email;
    private $phone_number;
    private $balance;

    // Getter of a user
    public function getId()
    {
        return $this->id_user;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getTelephoneNumber()
    {
        return $this->phone_number;
    }
    public function getBalance()
    {
        return $this->balance;
    }

    // Setter of a user
    public function setId($id_user)
    {
        $this->id_user = $id_user;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setTelephoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    // Constructor of a user
    public function __construct($id_user = NULL, $name = NULL, $password = NULL, $email = NULL, $phone_number = NULL, $balance = NULL)
    {
        if (!is_null($id_user) && !is_null($name) && !is_null($password) && !is_null($email) && !is_null($phone_number) && !is_null($balance)) {
            $this->id_user = $id_user;
            $this->name = $name;
            $this->password = $password;
            $this->email = $email;
            $this->phone_number = $phone_number;
            $this->balance = $balance;
        }
    }

    public static function getUserByUsername($username)
    {
        $query = "SELECT * FROM users WHERE name = :name";
        $p_query = Connexion::pdo()->prepare($query);
        $values = array("name" => $username);
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

    public static function getUserById($id_user)
    {
        $query = "SELECT * FROM users WHERE id_user = :id_user";
        $p_query = Connexion::pdo()->prepare($query);
        $values = array("id_user" => $id_user);
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

    public static function getUserWithPassword($id_user, $password)
    {
        $query = "SELECT id_user, name, password, email, phone_number, balance FROM users WHERE name = :name AND password = :password";
        $p_query = Connexion::pdo()->prepare($query);
        $values = array("name" => $id_user, "password" => $password);
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

    public static function getAllUsers()
    {
        $query = "SELECT id_user, name, password, email, phone_number, balance from users";
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

    public static function addUser($name, $password, $email, $phone_number, $balance)
    {
        $query = "INSERT INTO users (name, password, email, phone_number, balance) VALUES (:name, :password, :email, :phone_number, :balance)";
        $p_query = Connexion::pdo()->prepare($query);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Need to add a hash for the password
        $values = array(
            "name" => $name,
            "password" => $hashed_password,
            "email" => $email,
            "phone_number" => $phone_number,
            "balance" => $balance
        );
        try {
            $p_query->execute($values);
            return true;
        } catch (PDOException $e) {
            echo "erreur : " . $e->getMessage() . "<br>";
            return false;
        }
    }

    public static function deleteUserById($id_user)
    {
        $query = "DELETE FROM users WHERE id_user = :id_user";
        $req_prep = Connexion::pdo()->prepare($query);
        $values = array("id_user" => $id_user);
        try {
            $req_prep->execute($values);
            return true;
        } catch (PDOException $e) {
            echo "erreur : " . $e->getMessage() . "<br>";
        }
        return false;
    }

    public static function updateUser($id_user, $name, $password, $email, $phone_number, $balance)
    {
        $query = "UPDATE users SET name = :name, password = :password, email = :email, phone_number = :phone_number, balance = :balance WHERE id_user = :id_user";
        $p_query = Connexion::pdo()->prepare($query);
        $values = array(
            "id_user" => $id_user,
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
            echo "erreur : " . $e->getMessage() . "<br>";
            return false;
        }
    }

    public static function checkEmailExist($email)
    {
        $query = "SELECT id_user, name, password, email, phone_number, balance FROM users WHERE email = :email";
        $p_query = Connexion::pdo()->prepare($query);
        $values = array("email" => $email);
        $result = [];
        $nbResult = 0;
        try {
            $p_query->setFetchMode(PDO::FETCH_CLASS, 'User');
            $p_query->execute($values);
            $result = $p_query->fetchAll();
            $nbResult = $p_query->rowCount();
        } catch (PDOException $e) {
            $result["error"] = $e->getMessage();
        }

        if($nbResult > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public static function increaseBalance($id_user, $valbundle)
    {
        $query = "UPDATE users SET balance = balance + :val_bundle WHERE id_user = :id_user";
        $p_query = Connexion::pdo()->prepare($query);
        $values = array(
            "id_user" => $id_user,
            "val_bundle" => $valbundle
        );
        try {
            $p_query->execute($values);
            return true;
        } catch (PDOException $e) {
            echo "erreur : " . $e->getMessage() . "<br>";
            return false;
        }
    }

    public static function decreaseBalance($id_user, $valbundle)
    {
        $query = "UPDATE users SET balance = balance - :val_bundle WHERE users.id_user = :id_user";
        $p_query = Connexion::pdo()->prepare($query);
        $values = array(
            "id_user" => $id_user,
            "val_bundle" => $valbundle
        );
        try {
            $p_query->execute($values);
            return true;
        } catch (PDOException $e) {
            echo "erreur : " . $e->getMessage() . "<br>";
            return false;
        }
    }
}
