<?php
$modelaId = "service" . $service->getId();
$serviceName = TypeService::getTypeService($service->getIdTypeService())->getName();
$imgSrc = "assets/image/" . $serviceName . ".jpg";
?>
<div class="card h-100 bg-light text-dark espaceformodal" data-bs-toggle="modal" data-bs-target="<?php echo "#" . $modelaId ?>">
    <div class="badge bg-dark position-absolute" style="top: 0.5rem; right: 0.5rem">
        <?php
        echo $serviceName;
        ?>
    </div>
    <img class="card-img-top" src="<?php echo $imgSrc; ?>" style="object-fit: cover; height: 60%;" />
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
        <?php if (isset($_SESSION["id"]) && $_SESSION["id"] == $service->getIdUser()) : ?>
            <div class="text-center"><a style="border: none!important;" class="btn btn-outline-danger mt-auto" href="./index.html?controller=controllerHome&action=deleteService">Supprimer</a></div>
        <?php else : ?>
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./index.php?controller=controllerLogin&action=displayLogin">Acheter</a></div>
        <?php endif ?>
    </div>
</div>
<div class="Description-modal modal fade" id="<?php echo $modelaId ?>" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"></button></div>
            <div class="modal-body text-center pb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <h2 class="Description-modal-title text-secondary text-uppercase mb-0"><?php echo $service->getTitle() ?></h2>
                            <div class="divider-custom">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-line"></div>
                            </div>
                            <img class="img-fluid rounded mb-5" src="Image_ICI" alt="..." />
                            <p class="mb-4"><?php echo $service->getDescription() ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>