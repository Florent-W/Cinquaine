<!-- Section-->
<div class="container px-4 px-lg-5 mt-5">
    <div class="row g-2 row-cols-2 row-cols-lg-3 row-cols-xl-4 gap-2 mb-2 justify-content-center">
        <?php
        foreach ($services as $service) {
            echo "<div class='col' style='height: 600px; width: 500px'>";
            require "ServiceCard.php";
            echo "</div>";
        }
        ?>
    </div>
</div>