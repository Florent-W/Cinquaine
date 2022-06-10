<?php

$serviceName = TypeService::getTypeService($service->getIdTypeService())->getName();
$imgSrc = "assets/image/" . $serviceName . ".jpg";
?>
<div class="card h-100 bg-light text-dark">
    <div class="badge bg-dark position-absolute" style="top: 0.5rem; right: 0.5rem">
    <?php
        echo $serviceName;
    ?>
    </div>
    <img class="card-img-top" 
        src="<?php echo $imgSrc; ?>" 
        style="object-fit: cover; height: 60%;"/>
    <div class="card-body p-4">
        <div class="text-center">
            <h5 class="fw-bolder">
            <?php
                echo $service->getTitle();
            ?>
            </h5>
            <p>
            <?php
                echo $service->getDescription();
            ?>
            </p>
            <span>
            <?php
                echo $service->getPrice();
            ?>
            <i class="bi bi-cash"></i>
            </span>
        </div>
    </div>
    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
        <?php if($_SESSION["id"] == $service->getIdUser()): ?>
        <div class="text-center"><a style="border: none!important;" class="btn btn-outline-danger mt-auto" href="./index.html?controller=controllerHome&action=deleteService">Supprimer</a></div>
        <?php else: ?>
        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Acheter</a></div>
        <?php endif ?>
    </div>
</div>