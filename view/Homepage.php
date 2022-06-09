<!-- Section-->
<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php
            foreach($services as $service) {
              echo "
                <div class='col mb-5'>
                    <div class='card h-100' data-bs-toggle='modal' data-bs-target='#portfolioModal1'>
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
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Projet IMOP</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <img class="img-fluid rounded mb-5" src="assets/img/portfolio/IRM.jpg" alt="..." />
                                    <!-- Portfolio Modal - Text-->
                                    <p class="mb-4">Je travail en alternance dans le laboratoire de physique des deux infinis Irène Joliot-Curie (IJCLab) qui est une unité mixte de recherche du CNRS/IN2P3.
                                        Mon travail est le projet IMOP qui relève du domaine de l'imagerie médical.</p> 
                                    <p class="mb-4">Le projet IMOP permettra de traité les cancers du cerveau pour éviter les récidives, c'est-à-dire lors de 
                                        l'opération le patient atteint d'une tumeur se verra poser une sonde dans le cerveau qui enverra des données qui seront traitées en temps réel par l'interface web pour le chirurgien 
                                        ce qui lui permettra de déterminer avec précision quelles cellules est cancéreux et si cela est un succès l'utilisation d'IMOP sera utilisé pour d'autre cancers.
                                    </p>
                                    <p class="mb-4">Ce projet a pour objectif d'être déployé dans les hôpitaux français et selon le succès peut être à l'international.
                                    </p>
                                        Mon travail consisté a créé deux interfaces web en python ainsi qu'une base de donné, la première interface permettra de visualiser des données, 
                                        la deuxième interface est pour la sonde.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
