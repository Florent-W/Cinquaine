<!-- Section-->
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 gap-2 mb-2 justify-content-center">
        <?php
            foreach($services as $service) {
                echo "<div class='espaceformodal' data-bs-toggle='modal' data-bs-target='#DescriptionModal' style='height: 600px; width: 500px'>";
                require "ServiceCard.php";
                echo "</div>";
            }
        ?>
    </div>
</div>
<div class="Description-modal modal fade" id="DescriptionModal" tabindex="-1" aria-labelledby="DescriptionModal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Description Modal - Title-->
                                    <h2 class="Description-modal-title text-secondary text-uppercase mb-0"><?php echo $service->getTitle(); ?></h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Description Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="Image_ICI" alt="..." />
                                    <!-- Description Modal - Text-->
                                    <p class="mb-4"><?php echo $service->getDescription(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
