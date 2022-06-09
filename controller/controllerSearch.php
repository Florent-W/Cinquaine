<?php

class ControllerSearch {
    public static function displaySearch() {
        require_once("view/Navbar.php");
        require_once("view/SearchForm.php");
        if($input) {
            require_once("view/SearchResult.php");
        }
        require_once("view/Footer.php");
    }


}