<div class="search-list d-flex justify-content-center">
    <?php



        if(isset($_POST["oSaisie"]) && isset($_POST["oCategorie"])) {
            $saisie = $_POST["oSaisie"];
            $categorie = $_POST["oCategorie"];

            $services = Service::getAllServices();
            $filteredservices = array_filter($services, function($ser, $key) {
                return ($ser->getIdTypeService() == $_POST["oCategorie"] && (strpos($_POST["oSaisie"], $ser->getTitle()) !== false || strpos( $_POST["oSaisie"], $ser->getDescription()) !== false));
            }, ARRAY_FILTER_USE_BOTH);

            if(count($filteredservices) == 0) {
                echo "<p> Aucun résultat pour cette recherche </p>";
            }

            // TODO : Ajouter pagination
            foreach($filteredservices as $service) {
                echo "<div class='card mb-3' style='max-width: 900px;'>
                          <div class='row g-0'>
                            <div class='col-md-4'>
                              <img src='assets/image/dessin.jpg' class='img-fluid rounded-start' alt='...'>
                            </div>
                            <div class='col-md-8'>
                              <div class='card-body'>
                                <h5 class='card-title fw-bolder'>".$service->getTitle()."</h5>
                                <p class='card-text force-black'>".$service->getDescription()."</p>
                                <p class='card-text'><small class='text-muted'>".$service->getDateStart()."</small></p>
                              </div>
                            </div>
                          </div>
                        </div>";
            }
        }
        else {
            echo "<p> Aucun résultat pour cette recherche </p>";
        }
    ?>


</div>


