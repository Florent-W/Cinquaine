<!-- Section-->
<div class="container-fluid">
    <div class="row row-cols-2 row-cols-lg-3 row-cols-xl-4 gap-2 mb-2 justify-content-center">
        <?php
        foreach ($services as $service) {
            echo "<div class='col' style='width: 500px'>";
            require "ServiceCard.php";
            echo "</div>";
        }
        ?>
    </div>
</div>