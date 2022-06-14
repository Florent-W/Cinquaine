<style>
    .nav-item:nth-child(2) {
        background: rgba(31, 101, 126, 0.6);
    }
</style>
<div class="row formprofil">
    <div class="col-md-4">
        <div class="row justify-content-center text-dark ">
            <div class="col order-md-first mb-3">
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
        </div>
    </div>
    <div class="col">
        <div class="row justify-content-center text-dark">
            <?php
            foreach ($services as $service) {
                echo "    <div class='col-md-4 order-md-first' style='padding-top: 1vh'>
                <div class='d-grid gap-2'>";
                require("ServiceCard.php");
                echo "        </div>
                </div>";
            }
            ?>

        </div>
    </div>
</div>