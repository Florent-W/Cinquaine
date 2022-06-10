<!-- Section-->
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php
            foreach($services as $service) {
              echo "
                <div class='col mb-5'>
                    <div class='card h-100'>
                        <div class='espaceformodal' data-bs-toggle='modal' data-bs-target='#DescriptionModal'>
                        <!-- Product image-->
                        <img class='card-img-top' src='assets/image/dessin.jpg' alt='...' />
                        <!-- Product details-->
                        <div class='card-body p-4'>
                            <div class='text-center'>
                                <!-- Product name-->
                                <h5 class='fw-bolder'>{$service->getTitle()}</h5>
                                <!-- Product reviews-->
                                <div class='d-flex justify-content-center small text-warning mb-2'>
                                    <div class='bi-star-fill'></div>
                                    <div class='bi-star-fill'></div>
                                    <div class='bi-star-fill'></div>
                                    <div class='bi-star-fill'></div>
                                    <div class='bi-star-fill'></div>
                                </div>
                                <!-- Product price-->
                                <h5 class='fw-bolder'>€{$service->getPrice()}</h5>
                            </div>
                        </div>
                        </div>
                        <!-- Product actions-->
                        <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                            <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='#'>Ajouter au panier</a></div>
                        </div>
                    </div>
                </div>
                ";
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
                                    <h2 class="Description-modal-title text-secondary text-uppercase mb-0">Titre ICI</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Description Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="Image_ICI" alt="..." />
                                    <!-- Description Modal - Text-->
                                    <p class="mb-4">Insérer la description ICI</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
