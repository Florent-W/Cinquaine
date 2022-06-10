<div class="container pt-2 pb-2">
    <div class="row text-dark">
        <div class="col-md order-md-last mb-3">
            <div class="card bg-light">
                <div class="d-flex justify-content-center align-items-center bg-gradient" style="height: 200px; width: 100%;">
                    <img src="./assets/person-circle.svg" class="card-img-top h-75 w-75">
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <?php
                        echo $user->getName();
                        ?>
                    </h5>
                    <hr>
                    <ul style="list-style: none; padding: 0;">
                        <li><strong>Email: </strong>
                            <?php
                            echo $user->getEmail();
                            ?>
                        </li>
                        <hr>
                        <li><strong>Téléphone: </strong>
                            <?php
                            echo $user->getTelephoneNumber();
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 order-md-first">
            <div class="d-grid gap-2">
                <?php
                foreach ($services as $service) {
                    require("ServiceCard.php");
                }
                ?>
            </div>
        </div>
    </div>
</div>