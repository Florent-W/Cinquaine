<div class="d-flex position-relative justify-content-center align-items-center ">
  <a href="index.php" class="position-absolute" style="z-index: 99;"> <img class="brandlogo" src="assets/image/Service.png"> </a>
  <nav class="w-100 navbar navbar-expand-lg bg-dark align-items-end">
    <ul class="navbar-nav flex-fill mb-0">
      <?php if (isset($_SESSION["id"]) && session_status()== 2) : ?>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">
            Accueil
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php?action=displayProfile&controller=controllerHome">
            <i class="bi bi-person-circle"></i>
            Mon profil
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php?action=displayIncreaseBalance&controller=controllerHome">
            Balance :
            <?php
            $user = User::getUserById($_SESSION["id"]);

            echo ($user->getBalance());
            ?>
            <i class="bi bi-cash"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php?action=createService&controller=controllerService">
            Créer un service
          </a>
        </li>
        <li class="nav-item ms-lg-auto">
          <a class="nav-link" href="index.php?controller=controllerLogin&action=logout">
            <i class="bi bi-box-arrow-in-left"></i>
            Me déconnecter
          </a>
        </li>
      <?php else : ?>
        <li class="nav-item ms-lg-auto">
          <a class="nav-link connexionbtn" aria-current="page" href="index.php?controller=controllerLogin&action=displayLogin">
            <i class="bi bi-box-arrow-in-right"></i>
            Se connecter
          </a>
        </li>
      <?php endif ?>
    </ul>
</div>
</nav>
</div>