<?php

class ControllerLogin
{

    public static function displayLogin()
    {
        require_once("view/Navbar.php");
        require_once("view/ConnectionForm.php");
        require_once("view/Footer.php");
    }
    public static function displayRegister()
    {
        require_once("view/Navbar.php");
        require_once("view/RegisterForm.php");
        require_once("view/Footer.php");
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

        $user = user::getUser($uname);

        $up = $user->getPassword();



        //verfy passwd
        if (password_verify($psw, $up)) {
            $_SESSION["id"] = $user->getId();
            $_SESSION["name"] = $user->getName();
            ControllerHome::displayHome();
        } else {
            $messerr = "invalid username or password";
            echo $messerr;
            echo "<script>console.log ($messer);</script>";
            ControllerLogin::displayLogin();
        }
    }

    public static function register()
    {
        require_once("conf/Connexion.php");
        //ControllerHome::displayHome();
        Connexion::connect();
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $balance = 0;

        if (!empty($uname) && !empty($psw) && !empty($email) && !empty($phone_number)) {
            user::addUser($uname, $psw, $email, $phone_number, $balance);
            ControllerLogin::displayLogin();
            echo " acount successfuly added! ";
        } else {
            ControllerLogin::displayRegister();
            echo "empty field!";
        }
    }
}
