<?php

class controllerSeeder {
    
    public static function seedDataBase()
    {   
        // First insert 4 users
        $userDataSets = [
            ["jeanbon", "cochonou", 1000, "jeanbon2000@orange.fr", "+33606060606"],
            ["pierrepaul", "jacques", 1300, "ppj91400@gmail.com", "+33707070707"],
            ["doralexplorateur", "jetaimebabouche", 1300, "doraexp@gmail.com", "+33699999999"],
            ["calvin.yapi", "blagueurdufutur", 900, "calvin.yapi@outlook.com", "+33505050505"],
            ["robertjardineur", "petunias12345", 900, "robert.jardineur@club-internet.fr", "+330640060606"]
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


        // Then add multiple services of each type
        $serviceDataSets = [
            [1, 1, "Faire une paella", "Expert en cuisine depuis environ 10 ans, je suis chef. Je vous propose ce service pendant lequel nous allons, ensemble, étape par étape, apprendre à préparer une paella. J'espère que cela vous plaira."],
            [1, 1, "Apprendre à préparer une tarte aux fruits", "Expert en cuisine depuis environ 10 ans, je suis chef. Je vous propose ce service pendant lequel nous allons, ensemble, étape par étape, apprendre à préparer une tarte aux fruits (fraises, bananes, mirabelles...). J'espère que cela vous plaira."],
            [1, 1, "Venez manger un curry chez moi", "Expert en cuisine depuis environ 10 ans, je suis chef. Je vous propose ce service pendant lequel nous allons, ensemble, étape par étape, apprendre à préparer un curry de légumes contenant du poisson ou une viande de votre choix. J'espère que cela vous plaira."],
            [2, 1, "Dessiner un chien dans un hamac", "Diplômé d'un bac dessin, je cherche à prouver au monde qu'il est facile de dessiner. Dessinons ensemble un chien dans un hamac !"],
            [2, 1, "Faire des traits droits" , "Diplômé d'un bac dessin, je cherche à prouver au monde qu'il est facile de dessiner. Apprenons à faire des traits droits. Pratique pour les métiers manuels ou d'architecture."],
            [2, 1, "Dessiner des extraterrestres" , "Diplômé d'un bac dessin, je cherche à prouver au monde qu'il est facile de dessiner. Dessinons ensemble un extraterrestre dans sa soucoupe qui enlève un agriculteur et sa vache."],
            [3, 2, "Booster vos ventes sur internet", "Vous êtes pauvre ? Arrêtez tout de suite ! Devenez riche grâce à mes cours d'e-commerce. Apprenez dès maintenant comment booster les ventes de votre site internet !"],
            [3, 2, "Créer un site Shopify", "Vous êtes pauvre ? Arrêtez tout de suite ! Devenez riche grâce à mes cours d'e-commerce. Apprenez dès maintenant comment créer une boutique en ligne avec Shopify."],
            [3, 2, "Faire du marketing digital avec Instagram", "Vous êtes pauvre ? Arrêtez tout de suite ! Devenez riche grâce à mes cours d'e-commerce. Apprenez dès maintenant comment marketer sur Instagram."],
            [4, 2, "Installation de logiciels", "Ingénieur informaticien, je peux prendre la main à distance pour installer des logiciels sur votre ordinateur."],
            [4, 2, "Formattage de disque dur", "Ingénieur informaticien, je peux prendre la main à distance pour formatter votre disque dur."],
            [4, 2, "Cours d'informatique", "Ingénieur informaticien, je vous propose des cours d'informatique à distance."],
            [5, 3, "Tondre la pelouse", "Je peux tondre votre pelouse."],
            [5, 3, "Avoir une allée fleurie", "Ayant des excédents de graines et de boutures de fleurs, je peux fleurir votre allée."],
            [5, 3, "Potager dans votre jardin", "J'ai des variétés anciennes de légumes que je souhaite partager, nous pouvons ensemble les utiliser pour vous faire un potager."],
            [6, 3, "Booster votre perso dofus", "PGM - Je vais boost ton perso dofus."],
            [6, 3, "Coach League of Legends - 2H", "PGM - Je vais te coach sur LoL."],
            [6, 3, "Apprendre à jouer à Tetris", "PGM - Je vais t'apprendre à jouer à Tetris."],
            [7, 4, "Faire une randonnée", "Profitons du monde qui nous entoure ! Partons faire une randonnée !"],
            [7, 4, "Le tennis pour les nuls", "Profitons du monde qui nous entoure ! Apprenez à jouer au tenis."],
            [7, 4, "Allons à la piscine", "Profitons du monde qui nous entoure ! Allons nager !"],
            [8, 4, "Co-voiturage jusqu'à Bankok", "Partons en voyage ensemble, j'ai une voiture et nous partirons à Bankok avec."],
            [8, 4, "Comment faire du stop partout ?", "Partons en voyage ensemble, je vais vous apprendre à faire du stop efficacement."],
            [8, 4, "Tutoriel camping sauvage", "Partons en voyage ensemble, je vais vous apprendre comment il est possible de dormir n'importe où uniquement grâce à une tente."],
            [5, 5, "LE JARDIN DE ROBERT - Boutures", "Je m'appelle Robert et aujourd'hui nous allons ensemble faire des boutures."],
            [5, 5, "LE JARDIN DE ROBERT - Miel", "Je m'appelle Robert et aujourd'hui nous allons ensemble favoriser l'apparition d'abeilles pour faire du miel."],
            [5, 5, "LE JARDIN DE ROBERT - Oiseaux", "Je m'appelle Robert et aujourd'hui nous allons ensemble chasser les oiseaux."],
            [5, 5, "LE JARDIN DE ROBERT - Mildiou", "Je m'appelle Robert et aujourd'hui nous allons ensemble combattre le Mildiou."],
            [5, 5, "LE JARDIN DE ROBERT - Pesticides", "Je m'appelle Robert et aujourd'hui nous allons ensemble utiliser des pesticides."],
            [5, 5, "LE JARDIN DE ROBERT - Bouillie Bordelaise", "Je m'appelle Robert et aujourd'hui nous allons ensemble apprendre à faire de la bouillie bordelaise."],
            [5, 5, "LE JARDIN DE ROBERT - Orangers", "Je m'appelle Robert et aujourd'hui nous allons ensemble entretenir vos orangers."],
            [5, 5, "LE JARDIN DE ROBERT - Haricots", "Je m'appelle Robert et aujourd'hui nous allons ensemble faire pousser des haricots."],
            [5, 5, "LE JARDIN DE ROBERT - Permaculture", "Je m'appelle Robert et aujourd'hui nous allons ensemble apprendre à faire de la permaculture."],
            [5, 5, "LE JARDIN DE ROBERT - Engrais", "Je m'appelle Robert et aujourd'hui nous allons ensemble faire de l'engrais naturel."],
            [5, 5, "LE JARDIN DE ROBERT - Eau de pluie", "Je m'appelle Robert et aujourd'hui nous allons ensemble apprendre à récupérer l'eau de pluie pour arroser ses plantes."],
            [5, 5, "LE JARDIN DE ROBERT - Tailler le bambou", "Je m'appelle Robert et aujourd'hui nous allons ensemble à tailler votre forêt de bambou."],
            [5, 5, "LE JARDIN DE ROBERT - Gestion d'une serre", "Je m'appelle Robert et aujourd'hui nous allons ensemble apprendre à gérer une serre et la température à l'intérieur."],
            [5, 5, "LE JARDIN DE ROBERT - Couper un arbre", "Je m'appelle Robert et aujourd'hui nous allons ensemble couper un arbre. Oui. Chez vous. Un bel arbre de préférence."],
            [5, 5, "LE JARDIN DE ROBERT - Faire un verger", "Je m'appelle Robert et aujourd'hui nous allons ensemble faire un verger sur votre terrain."],
            [5, 5, "LE JARDIN DE ROBERT - Entretenir ses roses", "Je m'appelle Robert et aujourd'hui nous allons ensemble entretenir vos rosiers."],
            [5, 5, "LE JARDIN DE ROBERT - Mûres grimpantes", "Je m'appelle Robert et aujourd'hui nous allons ensemble favoriser l'apparition de mûres grimpants sur vos murs."],
            [5, 5, "LE JARDIN DE ROBERT - Vigne", "Je m'appelle Robert et aujourd'hui nous allons ensemble planter de la vigne."],
            [5, 5, "LE JARDIN DE ROBERT - Vin de pêches", "Je m'appelle Robert et aujourd'hui nous allons ensemble faire du vin de pêche à partir de feuilles de pêche de votre jardin."],
            [5, 5, "LE JARDIN DE ROBERT - Sirop de sureau", "Je m'appelle Robert et aujourd'hui nous allons ensemble faire du sirop de sureau naturel à partir de votre Sureau."],
            [5, 5, "LE JARDIN DE ROBERT - Mauvaises herbes", "Je m'appelle Robert et aujourd'hui nous allons ensemble combattre les mauvaises herbes qui se trouvent sur votre propriété."],
            [5, 5, "LE JARDIN DE ROBERT - Chasser les renards", "Je m'appelle Robert et aujourd'hui nous allons ensemble chasser du renard pour éviter qu'il ne mange vos poules."],
            [5, 5, "LE JARDIN DE ROBERT - Avoir des poules", "Je m'appelle Robert et aujourd'hui nous allons ensemble construire un poulailler et y mettre des poules."],
            [5, 5, "LE JARDIN DE ROBERT - Avoir une marre", "Je m'appelle Robert et aujourd'hui nous allons ensemble créer une marre."],
            [5, 5, "LE JARDIN DE ROBERT - Irriguer l'eau", "Je m'appelle Robert et aujourd'hui nous allons ensemble irriguer de l'eau jusqu'à vos plantations."],
            [5, 5, "LE JARDIN DE ROBERT - Arroser ses semis", "Je m'appelle Robert et aujourd'hui nous allons ensemble arroser vos semis."],
            [5, 5, "LE JARDIN DE ROBERT - Maïs", "Je m'appelle Robert et aujourd'hui nous allons ensemble cultiver du maïs."],
            [5, 5, "LE JARDIN DE ROBERT - Arrosoir", "Je m'appelle Robert et aujourd'hui nous allons ensemble faire un comparatif des arrosoirs du marché."],
            [5, 5, "LE JARDIN DE ROBERT - Bêche", "Je m'appelle Robert et aujourd'hui nous allons ensemble faire un comparatif des bêches de M. Bricolage."],
            [5, 5, "LE JARDIN DE ROBERT - Faire un trou", "Je m'appelle Robert et aujourd'hui nous allons ensemble faire un trou dans votre jardin."],
            [5, 5, "LE JARDIN DE ROBERT - Végétaliser une tonnelle", "Je m'appelle Robert et aujourd'hui nous allons ensemble végétaliser votre tonnelle."],
            [5, 5, "LE JARDIN DE ROBERT - Radis", "Je m'appelle Robert et aujourd'hui nous allons ensemble faire pousser des radis."]
        ];

        foreach($serviceDataSets as $insertedDataSet) {
            $resInsert = Service::addService($insertedDataSet[0], rand(80*10, 125*10)/10, $insertedDataSet[1], $insertedDataSet[2], $insertedDataSet[3]);
            
            if(!$resInsert) {
                print ("ERROR WITH SERVICE SEEDER INSERT WITH VALUES : " . $insertedDataSet[0] . $insertedDataSet[1] . $insertedDataSet[2]);
            }
        }

        print "L'insertion des données de test s'est bien passée. Vous pouvez maintenant vous connecter à un compte utilisateur de test.";
    }
}

?>