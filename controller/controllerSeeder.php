<?php

class controllerSeeder {
    
    public static function seedDataBase()
    {   
        // First insert 4 users
        $userDataSets = [
            ["jeanbon", "cochonou", 1000, "jeanbon2000@orange.fr", "+33606060606"],
            ["pierrepaul", "jacques", 1300, "ppj91400@gmail.com", "+33707070707"],
            ["doralexplorateur", "jetaimebabouche", 1300, "doraexp@gmail.com", "+33699999999"],
            ["calvin.yapi", "blagueurdufutur", 900, "calvin.yapi@outlook.com", "+33505050505"]
        ];
        
        foreach($userDataSets as $insertedDataSet) {
            $resInsert = User::addUser($insertedDataSet[0], $insertedDataSet[1], $insertedDataSet[3], $insertedDataSet[4], $insertedDataSet[2]);
            
            if(!$resInsert) {
                return ("ERROR WITH USER SEEDER INSERT WITH VALUES : " . $insertedDataSet[0] . $insertedDataSet[1] . $insertedDataSet[3] . $insertedDataSet[4] . $insertedDataSet[2]);
            }
        }

        // Then add 8 service names
        $serviceNameDataSets = [
            ["cuisine"],
            ["dessin"],
            ["ecommerce"],
            ["informatique"],
            ["jardinage"],
            ["jeuxvidéo"],
            ["sport"],
            ["voyage"]
        ];

        foreach($serviceNameDataSets as $insertedDataSet) {
            $resInsert = TypeService::addTypeService($insertedDataSet[0]);
            
            if(!$resInsert) {
                return ("ERROR WITH TYPE SERVICE SEEDER INSERT WITH VALUES : " . $insertedDataSet[0]);
            }
        }


        // Then add 1 Services one of each type, 2 per user

        // For an easier date management every service will start tomorrow and end next week
        $serviceStartDate = date("Y-m-d H:i:s", strtotime("+1 day"));
        $serviceEndDate = date("Y-m-d H:i:s", strtotime("+7 day"));

        $serviceDataSets = [
            [1, 1, "Faire une paella"],
            [1, 1, "Apprendre à préparer une tarte aux fruits"],
            [1, 1, "Venez manger un curry chez moi"],
            [2, 1, "Dessiner un chien dans un hamac"],
            [2, 1, "Faire des traits droits"],
            [2, 1, "Dessiner des extraterrestres"],
            [3, 2, "Booster vos ventes sur internet"],
            [3, 2, "Créer un site Shopify"],
            [3, 2, "Faire du marketing digital avec Instagram"],
            [4, 2, "Installation de logiciels"],
            [4, 2, "Formattage de disque dur"],
            [4, 2, "Cours d'informatique"],
            [5, 3, "Tondre la pelouse"],
            [5, 3, "Avoir une allée fleurie"],
            [5, 3, "Potager dans votre jardin"],
            [6, 3, "Booster votre perso dofus"],
            [6, 3, "Coach League of Legends - 2H"],
            [6, 3, "Apprendre à jouer à Tetris"],
            [7, 4, "Faire une randonnée"],
            [7, 4, "Le tennis pour les nuls"],
            [7, 4, "Allons à la piscine"],
            [8, 4, "Co-voiturage jusqu'à Bankok"],
            [8, 4, "Comment faire du stop partout ?"],
            [8, 4, "Tutoriel camping sauvage"]
        ];

        foreach($serviceDataSets as $insertedDataSet) {
            $resInsert = Service::addService($serviceStartDate, $serviceEndDate, $insertedDataSet[0], random_int(90, 160), $insertedDataSet[1], $insertedDataSet[2]);
            
            if(!$resInsert) {
                print ("ERROR WITH SERVICE SEEDER INSERT WITH VALUES : " . $insertedDataSet[0] . $insertedDataSet[1] . $insertedDataSet[2]);
            }
        }

        print "L'insertion des données de test s'est bien passée. Vous pouvez maintenant vous connecter à un compte utilisateur de test.";
    }



    /*  USER ADD MODEL

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

    */

    /*  TYPE SERVICE ADD MODEL
        public static function addTypeService($name) {
            $query = "INSERT INTO types_services (name) VALUES (:name)";
            $p_query = Connexion::pdo()->prepare($query);
		    $values = array(
		    	"name" => $name,
		    );
		    try {
		    	$p_query->execute($values);
		    	return true;
		    } catch (PDOException $e) {
		    	echo "erreur : ".$e->getMessage()."<br>";
		    	return false;
		    }
        }
    */

    /*  SERVICE ADD MODEL
        public static function addService($date_start, $date_end, $id_type_service, $price, $id_user, $title) {
        $query = "INSERT INTO services (date_start, date_end, id_type_service, price, id_user, title) VALUES (:date_start, :date_end, :id_type_service, :price, :id_user, :title)";
        $p_query = Connexion::pdo()->prepare($query);
		$values = array(
			"date_start" => $date_start,
			"date_end" => $date_end,
			"id_type_service" => $id_type_service,
            "price" => $price,
            "id_user" => $id_user,
            "title" => $title
		);
		try {
			$p_query->execute($values);
			return true;
		} catch (PDOException $e) {
			echo "erreur : ".$e->getMessage()."<br>";
			return false;
		}
    }
    */

}

?>