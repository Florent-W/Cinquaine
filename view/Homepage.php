<!-- Section-->
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php
            foreach($services as $service) {
              echo "
                <div class='col mb-5'>
                    <div class='card h-100'>
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
                                €{$service->getPrice()}
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

