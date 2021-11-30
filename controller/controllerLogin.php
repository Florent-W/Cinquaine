<?php

class ControllerLogin {

    public static function displayLogin() {
        require_once("view/Navbar.php");
        require_once("view/ConnectionForm.php");
    }

    public static function login($username, $pwd) {
        ControllerHome::displayHome();

        // Si le user existe et que tout va bien
        // créer le cookie de session + retour sur la page d'accueil
    }

}
