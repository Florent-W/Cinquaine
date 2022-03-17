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

        $tabResults = User::getUserWithPassword($uname, $psw);

        if (!empty($tabResults)) {
            $_SESSION["id"] = $tabResults->getId();
            $_SESSION["name"] = $tabResults->getName();
            //header('location : Homepage.php');
        } else {
            $messerr = "invalid username or password";
            ControllerLogin::displayLogin();
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
