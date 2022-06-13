
<div class="container pt-2 pb-2">
    <div class="row justify-content-center text-dark formprofil">
        <div class="col-lg-7 order-md-first">
            <div class="d-grid gap-2">
                <?php
                    foreach ($services as $service) {
                        echo
                        "<div class='row justify-content-center text-dark formprofil'>
                                <div class='col-md'>";
                        require("ServiceCard.php");

                        echo "<p>" . $service->getComment($_SESSION["id"], $service->getId()) . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>