<?php

class ControllerLogin
{

    public static function displayLogin()
    {
        require_once("view/Navbar.php");
        require_once("view/ConnectionForm.php");
    }

    public static function login($username, $pwd)
    {
        session_start();
        require_once("conf/Connexion.php");
        ControllerHome::displayHome();
        Connexion::connect();


        // Si le user existe et que tout va bien
        // créer le cookie de session + retour sur la page d'accueil

        $uname = $_POST['uname'];
        $psw = $_POST['psw'];

        $sql = 'SELECT $uname from users where "password" = $psw';
        $req_prep = Connexion::pdo()->prepare($sql);
        $tabResults = $req_prep->fetchAll();

        if (!empty($tabResults)) {
            header('location : Homepage.php');
            $_SESSION["id"] = $tabResults[0];
            $_SESSION["uname"] = $_POST['uname'];
        } else {

            $messerr = "invalid username or password litle shit";
            echo $messerr;
            echo "<button href='/view/ConnectionForm'>Login</button>";
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
