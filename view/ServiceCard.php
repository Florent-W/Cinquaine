<?php
$modelaId = "service" . $service->getId();
$serviceName = TypeService::getTypeService($service->getIdTypeService())->getName();
$imgSrc = "assets/image/" . $serviceName . ".jpg";
?>
<div class="card bg-light text-dark espaceformodal" data-bs-toggle="modal" data-bs-target="<?php echo "#" . $modelaId ?>">
    <div class="position-absolute top-0 h-10 w-100">
        <div class="d-flex justify-content-between m-2">
            <div class="d-flex flex-column gap-1">
                <div class="badge bg-info" style="height: max-content; width: max-content;">
                    <?php
                    echo $service->getTitle();
                    ?>
                </div>
                <div class="badge bg-warning" style="height: max-content; width: max-content;">
                    <?php
                    echo $serviceName;
                    ?>
                </div>
            </div>
            <div class="badge bg-success" style="height: max-content; width: max-content;">
                <?php
                echo $service->getPrice();
                ?>
                <i class="bi bi-cash"></i>
            </div>
        </div>
    </div>
    <div class="position-absolute bottom-0 pb-2 w-100">
        <div class="d-flex justify-content-between align-items-end m-2">
            <div class="badge bg-light text-dark" style="height: max-content; width: max-content;">
                <?php
                echo "avec " . User::getUserById($service->getIdUser())->getName();
                ?>
            </div>
            <?php if (isset($_SESSION["id"]) && $_SESSION["id"] == $service->getIdUser()) : ?>
                <div class="text-center"><a style="border: none!important;" class="btn btn-outline-danger mt-auto" href="./index.html?controller=controllerHome&action=deleteService">Supprimer</a></div>
            <?php else : ?>
                <div class="text-center"><a style="border: none!important;" class="btn btn-outline-success mt-auto" href="./index.php?controller=controllerLogin&action=displayLogin">Acheter</a></div>
            <?php endif ?>
        </div>
    </div>
    <img class="card-img-top" src="<?php echo $imgSrc; ?>" style="object-fit: cover;" />
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