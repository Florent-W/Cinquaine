<div class="d-flex position-relative justify-content-center align-items-center flex-column" style="background-image: url(assets/image/temp_banner.jpg); width: 100%; height: 200px; background-repeat: no-repeat; background-size: cover;">
  <img src="assets/image/Service.png" height="50%">
  <nav class="w-100 position-absolute bottom-0 navbar navbar-light bg-transparent">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Service</a>
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <?php if (true): // TODO: Utilisateur est connecte! ?>
        <a class="nav-link active" aria-current="page" href="#">
          <i class="bi bi-person-circle"></i>
          Mon profil
        </a>
        <?php else: ?>
        <a class="nav-link active" aria-current="page" href="#">
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