<div class="container pt-2 pb-2">
    <div class="row text-dark">
        <div class="col-sm order-sm-last mb-3">
            <div class="card bg-light">
                <div class="card-header">
                    Profil
                    <a href="index.php?controller=controllerLogin&action=logout" class="text-reset">
                    <div class="float-end">
                    <i class="bi bi-box-arrow-in-left"></i>
                    Me déconnecter
                    </div>
                    </a>
                </div>
                <div class="d-flex justify-content-center align-items-center bg-gradient" style="height: 200px; width: 100%;">
                    <img src="./assets/person-circle.svg" class="card-img-top h-75 w-75">
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                    <?php 
                    echo $user->getName(); 
                    ?>
                    <!-- placeholder -->
                    </h5>
                    <p class="card-text">
                    <ul>
                    <li><strong>Balance: </strong>
                    <?php 
                    echo $user->getBalance(); 
                    ?>
                    <!-- placeholder -->
                    </li>
                    <hr>
                    <li><strong>Email: </strong>
                    <?php 
                    echo $user->getEmail(); 
                    ?>
                    <!-- placeholder -->
                    </li>
                    <li><strong>Téléphone: </strong>
                    <?php 
                    echo $user->getTelephoneNumber(); 
                    ?>
                    <!-- placeholder -->
                    </li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-8 order-sm-first">
            <div class="d-grid gap-2">
            <?php
                // echo "<div style='height: 600px!important;'>";
                // require("ServiceCard.php");
                // echo "</div>";
                $services = Service::getAllServicesFromUser($_SESSION["id_user"]);
                foreach ($services as $service) { 
                    echo "<div style='height: 600px!important;'>";
                    require("ServiceCard.php");
                    echo "</div>";
                }
            ?>
            </div>
        </div>
    </div>
</div>  