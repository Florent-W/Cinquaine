<?php

class ControllerLogin
{

    public static function displayLogin($message = NULL, $isError = false)
    {
        require_once("view/Navbar.php");
        require_once("view/ConnectionForm.php");
        require_once("view/Footer.php");
        require_once("view/FormToast.php");
    }
    public static function displayRegister($message = NULL)
    {
        require_once("view/Navbar.php");
        require_once("view/RegisterForm.php");
        require_once("view/Footer.php");
        require_once("view/FormToast.php");
    }

    public static function login() //permet de se connecter à un compte avec un nom d'utilisateur et un mot de passe
    {
        require_once("conf/Connexion.php");
        //ControllerHome::displayHome();
        Connexion::connect();


        // Si le user existe et que tout va bien
        // créer le cookie de session + retour sur la page d'accueil

        $uname = $_POST['uname'];
        $psw = $_POST['psw'];

        $user = user::getUserByUsername($uname);

        if(!empty($user)){
        $up = $user->getPassword();
        }
        else{
         $up = '';   
        }

        //verfy passwd
        if (password_verify($psw, $up)) {
            $_SESSION["id"] = $user->getId();
            $_SESSION["name"] = $user->getName();
            ControllerHome::displayHome();
        } else {
            /*$messerr = "invalid username or password";
            echo $messerr;
            echo "<script>console.log ($messer);</script>";*/
            ControllerLogin::displayLogin('Mot de passe et/ou login invalide(s)', true);
        }
    }

    public static function logout() //permet de se déconnecter
    {
        session_destroy();
        ControllerLogin::displayLogin("Déconnecté avec succès");
    }

    public static function register() //permet de créer un compte
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
            if(user::checkEmailExist($email)){
                ControllerLogin::displayRegister("Email déjà utilisée!");
            }
            else{
            user::addUser($uname, $psw, $email, $phone_number, $balance);
            ControllerLogin::displayLogin("Compte créé avec succès!");
            }
        } 
        else {
            ControllerLogin::displayRegister("Champ(s) vide(s)!");
        }
    }
}
