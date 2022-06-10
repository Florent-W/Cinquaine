<div class="d-flex flex-column align-items-center justify-content-center">
  <?php

  if (isset($_GET["oSaisie"]) && isset($_GET["oCategorie"])) {
    $saisie = $_GET["oSaisie"];
    $categorie = $_GET["oCategorie"];
    $services = Service::getAllServices();
    $filteredservices = array_filter($services, function ($ser) use ($saisie, $categorie) {
      return ($ser->getIdTypeService() == $categorie &&
        (strpos(strval($ser->getTitle()), strval($saisie))  !== false ||
          strpos(strval($ser->getDescription()), strval($saisie)) !== false)
      );
    });
    $filteredservices = array_values($filteredservices);
    echo "</pre>";

    if (count($filteredservices) == 0) {
      echo "<p> Aucun résultat pour cette recherche </p>";
    }
    $page = 1;
    $itemperpage = 10;

    if(isset($_GET["page"])) {
        $page = htmlspecialchars($_GET["page"]);
    }


    for($i = ($page-1) * $itemperpage; $i <($itemperpage * $page)-1; $i++) {

      echo "<div class='card mb-3' style='max-width: 900px;'>
                          <div class='row g-0'>
                            <div class='col-md-4'>
                              <img src='assets/image/dessin.jpg' class='img-fluid rounded-start' alt='...'>
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
    }

        echo "  <div aria-label='Page navigation'>
                    <ul class='pagination'>";

            if($page > 1) {
                echo "<li class='page-item'>
                        <a class='page-link' href='index.php?controller=controllerSearch&action=displaySearch&page=".strval($page-1)."&oSaisie=".$_GET["oSaisie"]."&oCategorie=".$_GET["oCategorie"]."'>Précédent
                        </a>
                      </li>";
            }

        for($i = 1; $i <= intdiv(count($filteredservices),$itemperpage); $i++) {
            echo "<li class='page-item'><a class='page-link' href='index.php?controller=controllerSearch&action=displaySearch&page=".strval($i)."&oSaisie=".$_GET["oSaisie"]."&oCategorie=".$_GET["oCategorie"]."'>".$i."</a></li>";
        }
        if(($page) < intdiv(count($filteredservices),$itemperpage)) {
            echo "<li class='page-item'><a class='page-link' href='index.php?controller=controllerSearch&action=displaySearch&page=".strval($page+1)."&oSaisie=".$_GET["oSaisie"]."&oCategorie=".$_GET["oCategorie"]."'>Suivant</a></li>";
        }

        echo "
                    </ul>
                  </div>";


  } else {
    echo "<p> Aucun résultat pour cette recherche </p>";
  }

  ?>

</div>