<?php

class ControllerLogin
{

    public static function displayLogin()
    {
        require_once("view/Navbar.php");
        require_once("view/ConnectionForm.php");
    }

    public static function login()
    {
        session_start();
        require_once("conf/Connexion.php");
        //ControllerHome::displayHome();
        Connexion::connect();


        // Si le user existe et que tout va bien
        // créer le cookie de session + retour sur la page d'accueil

        $uname = $_POST['uname'];
        $psw = $_POST['psw'];

        $sql = "SELECT * from users where password = :password AND name = :name";
        $req_prep = Connexion::pdo()->prepare($sql);
        try {
            $values = array(
                "password" => $psw,
                "name" => $uname
            );
            $req_prep->execute($values);
            $tabResults = $req_prep->fetchAll();
        } catch (PDOException $e) {
            echo "erreur : ".$e->getMessage()."<br>";
            return false;
        }

        var_dump($tabResults);
        die();
        if (!empty($tabResults)) {
            //header('location : Homepage.php');
            $_SESSION["id"] = $tabResults[0];
            $_SESSION["name"] = $_POST['uname'];
        } else {

            $messerr = "invalid username or password litle shit";
            echo $messerr;
            echo $uname;
            ControllerLogin::displayLogin();
            foreach ($tabResults as $test) {
                echo $test;
            }
        }
    }

    public static function register()
    {
        ControllerHome::displayHome();
        Connexion::connect();

        $uname = $_POST['uname'];
        $psw = $_POST['psw'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $balance = 0;

        userModel::addUser($uname, $psw, $email, $phone_number, $balance);
    }
}
