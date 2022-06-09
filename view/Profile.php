<div class="container pt-2">
    <div class="row text-dark">
        <div class="col-sm order-sm-last mb-3">
            <div class="card bg-light">
                <div class="card-header">
                    Jean Eude
                    <a href="index.php?action=displaySettings" class="text-reset"><i class="bi bi-gear-fill float-end"></i></a>
                </div>
                <div class="d-flex justify-content-center align-items-center bg-gradient" style="height: 200px; width: 100%;">
                    <img src="./assets/person-circle.svg" class="card-img-top h-75 w-75">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-sm-8 order-sm-first">
            <div class="d-grid gap-2">
            <?php 
                // getAllServicesByUser($id_user)
                for ($i=0; $i < 10; $i++) { 
                    echo "<div style='height: 600px!important;'>";
                    require("ServiceCard.php");
                    echo "</div>";
                }
            ?>
            </div>
        </div>
    </div>
</div>  