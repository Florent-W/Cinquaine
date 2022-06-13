
<div class="container pt-2 pb-2">
    <div class="row justify-content-center text-dark formprofil">
        <div class="col-md-6 order-md-first">
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