<?php

class controllerSeeder {
    
    public static function seedDataBase()
    {   
        // First insert 3 users
        $userDataSets = [
            ["Jean Bon", "cochonou", 1000, "jeanbon2000@orange.fr", "+33606060606"],
            ["Pierre Paul", "jacques", 1300, "ppj91400@gmail.com", "+33707070707"],
            ["Calvin Yapi", "blagueurdufutur", 900, "calvin.yapi@outlook.com", "+33505050505"]
        ];
        
        foreach($userDataSets as $insertedDataSet) {
            $resInsert = User::addUser($insertedDataSet[0], $insertedDataSet[1], $insertedDataSet[3], $insertedDataSet[4], $insertedDataSet[2]);
            
            if(!$resInsert) {
                return ("ERROR WITH USER SEEDER INSERT WITH VALUES : " . $insertedDataSet[0] . $insertedDataSet[1] . $insertedDataSet[3] . $insertedDataSet[4] . $insertedDataSet[2]);
            }
        }

        // Then add 3 service names
        $serviceNameDataSets = [
            ["Jardinage"],
            ["Bricolage"],
            ["Informatique"]
        ];

        foreach($serviceNameDataSets as $insertedDataSet) {
            $resInsert = TypeService::addTypeService($insertedDataSet[0]);
            
            if(!$resInsert) {
                return ("ERROR WITH TYPE SERVICE SEEDER INSERT WITH VALUES : " . $insertedDataSet[0]);
            }
        }


        // Then add 9 Services one of each type

        // For an easier date management every service will start tomorrow and end next week
        $serviceStartDate = date("Y-m-d H:i:s", strtotime("+1 day"));
        $serviceEndDate = date("Y-m-d H:i:s", strtotime("+7 day"));

        $serviceDataSets = [
            [1, 1, "Taillage de haies"],
            [1, 1, "Planter des fleurs"],
            [1, 1, "Arracher les mauvaises herbes"],
            [2, 2, "Réparer un meuble"],
            [2, 2, "Aide plomberie"],
            [2, 2, "Changement d'ampoule"],
            [3, 3, "Installation de logiciels"],
            [3, 3, "Changement de système d'exploitation"],
            [3, 3, "Nettoyage d'ordinateur"]
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