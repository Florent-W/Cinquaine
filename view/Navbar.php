<div class="d-flex position-relative justify-content-center align-items-center flex-column bckgroundblack">
  <a href="index.php"  style="z-index: 99;"> <img src="assets/image/Service.png"> </a>
  <nav class="w-100 position-absolute bottom-0 navbar navbar-light bg-transparent" style="padding-top: 15vh;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Service</a>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <?php if (isset($_SESSION["id"])) :
          ?>
            <a class="nav-link active" aria-current="page" href="index.php?action=displayProfile&controller=controllerHome">
              <i class="bi bi-person-circle"></i>
              Mon profil
              <a class="nav-link active" aria-current="page" href="index.php?action=displayProfile&controller=controllerHome">
                Balance :
                <?php
                     $user = User::getUserById($_SESSION["id"]);

                     echo($user->getBalance());
                 ?>
                <i class="bi bi-cash"></i>
              </a>
              <a class="nav-link active" aria-current="page" href="index.php?action=createService&controller=controllerService">
                Créer un service
              </a>
            </a>
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