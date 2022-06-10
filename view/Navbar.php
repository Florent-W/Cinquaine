<div class="d-flex position-relative justify-content-center align-items-center flex-column bckgroundblack">
  <a href="index.php" class="position-absolute" style="z-index: 99;"> <img src="assets/image/Service.png"> </a>
  <nav class="w-100 align-items-end navbar bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="./index.php">Service</a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <?php if (isset($_SESSION["id"])) : ?>
            <a class="nav-link active">
              Balance :
              <?php
              $user = User::getUserById($_SESSION["id"]);

              echo ($user->getBalance());
              ?>
              <i class="bi bi-cash"></i>
            </a>
            <a class="nav-link active" aria-current="page" href="index.php?action=createService&controller=controllerService">
              Créer un service
            </a>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo User::getUserById($_SESSION["id"])->getName(); ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="index.php?action=displayProfile&controller=controllerHome"><i class="bi bi-person-circle"></i>
                  Mon profil</a></li>
              <li><a class="dropdown-item" href="index.php?controller=controllerLogin&action=logout"><i class="bi bi-box-arrow-in-left"></i>
                  Me déconnecter</a></li>
            </ul>
          <?php else : ?>
            <a class="nav-link active connexionbtn" aria-current="page" href="index.php?controller=controllerLogin&action=displayLogin">
              <i class="bi bi-box-arrow-in-right"></i>
              Se connecter
            </a>
          <?php endif ?>
        </li>
      </ul>
    </div>
</div>
</nav>
</div>