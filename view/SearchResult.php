<div class="d-flex flex-column align-items-center justify-content-center">
  <?php

  if (isset($_GET["oSaisie"]) && isset($_GET["oCategorie"])) {
    $saisie = $_GET["oSaisie"];
    $categorie = $_GET["oCategorie"];
    $services = Service::getAllServices();
    $filteredservices = array_filter($services, function ($ser) use ($saisie, $categorie) {
      return ($ser->getIdTypeService() == $categorie &&
        (strpos(strval(strtoupper($ser->getTitle())), strtoupper(strval($saisie)))  !== false ||
          strpos(strtoupper(strval($ser->getDescription())), strtoupper(strval($saisie))) !== false)
      );
    });
    $filteredservices = array_values($filteredservices);
    echo "</pre>";

    if (count($filteredservices) == 0) {
      echo "<p> Aucun résultat pour cette recherche </p>";
    }
    $page = 1;
    $itemperpage = 10;

    if (isset($_GET["page"])) {
      $page = htmlspecialchars($_GET["page"]);
    }

    $count = 0;
    for ($i = ($page - 1) * $itemperpage; ($i < ($itemperpage * $page) - 1) && ($count < count($filteredservices)); $i++) {

      $serviceName = TypeService::getTypeService($filteredservices[$i]->getIdTypeService())->getName();
      $confirmationId = "confirmation-service" . $filteredservices[$i]->getId();
      $imgSrc = "assets/image/" . $serviceName . ".jpg";
      echo "<div class='card mb-3' style='max-width: 1000px;'>
                          <div class='row g-0'>
                          <div class='position-absolute top-0 h-10 w-100'>
                          <div class='d-flex justify-content-between m-2'>
                              <div class='d-flex flex-column gap-1'>
                                  <div class='badge bg-info' style='height: max-content; width: max-content;'>
                                     ". $filteredservices[$i]->getTitle() ."
                                  </div>
                                  <div class='badge bg-warning 'style='height: max-content; width: max-content;'>
                                     $serviceName
                                  </div>
                              </div>
                            </div>
                            </div>
                            <div class='col-md-4'>
                              <img src=" . $imgSrc . " class='img-fluid rounded-start' alt='...'>
                            </div>
                            <div class='position-absolute bottom-0 pb-2 w-100'>
                            <div class='d-flex justify-content-between align-items-end m-2'>
                              <div class='badge bg-success' style='height: max-content; width: max-content;'>
                                ". $filteredservices[$i]->getPrice() ."
                                <i class='bi bi-cash'></i>
                              </div>
                            </div>
                            <div class='d-flex justify-content-between align-items-end m-2'>
                                <div class='badge bg-light text-dark' style='height: max-content; width: max-content;'>
                                    avec ". User::getUserById($filteredservices[$i]->getIdUser())->getName() ."
                                </div>
                            </div>
                            </div>
                            <div class='position-absolute bottom-0 pb-2 w-100' style='left: 220px'>
                              <div class='d-flex justify-content-between align-items-end m-2'>
                                <div style='height: max-content; width: max-content;'>
                                <div class='confirmationformodal' data-bs-toggle='modal' data-bs-target=' '#' ". $confirmationId ." '>
                                "; if (isset($_SESSION['id']) && $_SESSION['id'] == $filteredservices[$i]->getIdUser()) {
                                 echo "<div class='text-center'><a style='border: none!important;' class='btn btn-outline-danger mt-auto' href='./index.php?controller=controllerService&action=deleteService&id=" . $filteredservices[$i]->getId() . "'>Supprimer</a></div>
                                ";}
                                 elseif (isset($_SESSION['id']) && in_array($_SESSION['id'], $filteredservices[$i]->getBuyers())) {
                                 echo "<div class='text-center'><a style='border: none!important;' class='btn btn-outline-danger mt-auto' href='./index.php?controller=controllerService&action=cancelService&service_id=" . $filteredservices[$i]->getId() . "'>Annuler</a></div>
                                ";}
                                elseif (isset($_SESSION['id']) ) {
                                 echo "<div class='text-center confirmationformodal' data-bs-toggle='modal' data-bs-target=' " . "#" . $confirmationId ." '>
                                           <span style='border: none!important' class='btn btn-outline-danger mt-auto'>Acheter</span>
                                       </div>
                                ";}
                                else {
                                  echo "<div class='text-center'>
                                     <a style='border: none!important'class='btn btn-outline-success mt-auto' href='./index.php?controller=controllerLogin&action=displayLogin'>Acheter</a>
                                  </div>
                                 ";} echo"
                                </div>
                                </div>
                              </div>
                            </div>
                            <div class='col-md-8'>
                              <div class='card-body'>
                                <h5 class='card-title fw-bolder'>" . $filteredservices[$i]->getTitle() . "</h5>
                                <p class='card-text force-black'>" . $filteredservices[$i]->getDescription() . "</p>
                                <p class='card-text'><small class='text-muted'>" . $filteredservices[$i]->getDateStart() . "</small></p>
                              </div>
                            </div>
                          </div>
                        </div>";
      $count++;
    }

    echo "  <div aria-label='Page navigation'>
                    <ul class='pagination'>";

    if ($page > 1) {
      echo "<li class='page-item'>
                        <a class='page-link' href='index.php?controller=controllerSearch&action=displaySearch&page=" . strval($page - 1) . "&oSaisie=" . $_GET["oSaisie"] . "&oCategorie=" . $_GET["oCategorie"] . "'>Précédent
                        </a>
                      </li>";
    }

    for ($i = 1; $i <= intdiv(count($filteredservices), $itemperpage); $i++) {
      echo "<li class='page-item'><a class='page-link' href='index.php?controller=controllerSearch&action=displaySearch&page=" . strval($i) . "&oSaisie=" . $_GET["oSaisie"] . "&oCategorie=" . $_GET["oCategorie"] . "'>" . $i . "</a></li>";
    }
    if (($page) < intdiv(count($filteredservices), $itemperpage)) {
      echo "<li class='page-item'><a class='page-link' href='index.php?controller=controllerSearch&action=displaySearch&page=" . strval($page + 1) . "&oSaisie=" . $_GET["oSaisie"] . "&oCategorie=" . $_GET["oCategorie"] . "'>Suivant</a></li>";
    }

    echo "
                    </ul>
                  </div>";
  } else {
    echo "<p> Aucun résultat pour cette recherche </p>";
  }

  ?>

</div>