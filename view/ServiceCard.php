<?php
$modelaId = "service" . $service->getId();
$confirmationId = "confirmation-service" . $service->getId();
$serviceName = TypeService::getTypeService($service->getIdTypeService())->getName();
$imgSrc = "assets/image/" . $serviceName . ".jpg";
?>
<div class="card bg-light text-dark">
<div class="espaceformodal" data-bs-toggle="modal" data-bs-target="<?php echo "#" . $modelaId ?>"> 
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
    <img class="card-img-top" src="<?php echo $imgSrc; ?>" style="object-fit: cover;" />
    </div>
    <div class="confirmationformodal" data-bs-toggle="modal" data-bs-target="<?php echo "#" . $confirmationId ?>"> 
    <div class="position-absolute bottom-0 pb-2 w-100">
        <div class="d-flex justify-content-between align-items-end m-2">
            <div class="badge bg-light text-dark" style="height: max-content; width: max-content;">
                <?php
                echo "avec " . User::getUserById($service->getIdUser())->getName();
                ?>
            </div>
            <?php if (isset($_SESSION["id"]) && $_SESSION["id"] == $service->getIdUser()) { ?>
                <div class="text-center"><a style="border: none!important;" class="btn btn-outline-danger mt-auto" href="./index.php?controller=controllerService&action=deleteService&id=<?php echo $service->getId(); ?>">Supprimer</a></div>
            <?php }
            else if (isset($_SESSION["id"]) && in_array($_SESSION["id"], $service->getBuyers())) { ?>
                <div class="text-center"><a style="border: none!important;" class="btn btn-outline-danger mt-auto" href="./index.php?controller=controllerService&action=cancelService&service_id=<?php echo $service->getId(); ?>">Annuler</a></div>
            <?php
            }
            else if (isset($_SESSION["id"]) && $_SESSION["id"] != $service->getIdUser()) { ?>
                <div class="text-center"><a style="border: none!important;" class="btn btn-outline-danger mt-auto">Acheter</a></div>
            <?php }
            else { ?>
                <div class="text-center"><a style="border: none!important;" class="btn btn-outline-success mt-auto" href="./index.php?controller=controllerLogin&action=displayLogin">Acheter</a></div>
            <?php } ?>
        </div>
    </div>
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
                            <h2 class="Description-modal-title text-secondary text-uppercase mb-3"><?php echo $service->getTitle() ?></h2>
                            <div class="divider-custom">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-line"></div>
                            </div>
                            <img class="img-fluid rounded mb-5" src="<?php echo $imgSrc; ?>" alt="..." />
                            <p class="mb-4"><?php echo $service->getDescription() ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="Confirmation-modal modal fade" id="<?php echo $confirmationId ?>" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal"></button></div>
            <div class="modal-body text-center pb-5">
                <form class="mx-1 mx-md-4" action="index.php?action=buyService&id=<?php echo $service->getId();?>&controller=controllerService" method="post" >
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h2 class="Confirmation-modal-title text-secondary text-uppercase mb-3"> Voullez-vous procéder à l'achat du service auprès de <?php echo User::getUserById($service->getIdUser())->getName();?> ?</h2>
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-line"></div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                        <label for="description" class="form-label">Le Service choisis est : <?php echo $service->getTitle();?>.</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                        <label for="description" class="form-label">Le Prix correspondant au service est de : <?php echo $service->getPrice(); ?> <i class="bi bi-cash"></i> points.</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-5">
                                        <label for="description" class="form-label">Veuillez saisir une description de votre demande.</label>
                                        <br>
                                        <br>
                                        <textarea class="form-control" maxlength="200" name="description" rows="4" cols="10" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button class="btn btn-lg" type="submit">Confirmer l'achat</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>