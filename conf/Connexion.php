<?php 
	class Connexion {
	    // IDENTIFIANT A REMPLACER POUR CORRESPONDRE AUX VOTRES

		private static $hostname = 'localhost';
		private static $database = 'cinquaine';
		private static $login = 'root';
		private static $pwd = '';

		private static $tabUTF8 = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

		private static $pdo = "";

		public static function connect(): bool {
			try {
			self::$pdo = new PDO("mysql:host=".self::$hostname.";dbname=".self::$database,self::$login,self::$pwd,self::$tabUTF8);
			self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				return true;

			} catch(PDOException $e) {
				echo "erreur de connexion : ".$e->getMessage()."<br>";
				return false;
			} 
		}

		public static function pdo() {
			return self::$pdo;
		}

	}
?>