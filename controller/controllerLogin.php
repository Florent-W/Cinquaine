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
        ControllerHome::displayHome();
        Connexion::connect();


        // Si le user existe et que tout va bien
        // créer le cookie de session + retour sur la page d'accueil

        $uname = $_POST['uname'];
        $psw = $_POST['psw'];

        $sql = 'SELECT $uname from users where "password" = $psw';
        $req_prep = self::$pdo->prepare($sql);
        $req_prep->execute();
        $tabResults = $req_prep->fetchAll();



        if (!empty($tabResults)) {
        }
    }
}
