<?php
$imgSrc = "assets/image/" + $service->getTypeService() + ".jpg";
?>
<div class="card h-100 bg-light text-dark">
    <div class="badge bg-dark position-absolute" style="top: 0.5rem; right: 0.5rem">
    <?php
        $service->getIdTypeService();
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
            <div class="d-flex justify-content-center small mb-2">
                <span>
                    <?php echo $service->getDateStart(); ?>
                     - 
                    <?php echo $service->getDateEnd(); ?>
                </span>
            </div>
            <span>
            <?php
                echo $service->getPrice();
            ?>
            </span>
        </div>
    </div>
    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Acheter</a></div>
    </div>
</div>