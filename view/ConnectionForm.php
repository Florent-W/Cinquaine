<section class="vh-100">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px; background: rgba(31, 101, 126, 0.4);">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Connexion</p>

                <form class="mx-1 mx-md-4" action="index.php?action=login&controller=controllerLogin" method="post" class="loginform">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="uname">Votre nom</label>
                      <input type="text" name="uname" class="form-control" placeholder="Entrer votre nom" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="psw">Votre mot de passe</label>
                      <input type="password" name="psw" class="form-control" placeholder="Entrer votre mot de passe" />
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn btn-lg"  type="submit" class="btn btn-lg">Connexion</button>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-1">
                    <input class="form-check-input me-2" type="checkbox" name="remember" checked="checked" />
                    <label class="form-check-label">
                      Se souvenir du mot de passe
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn btn-lg"><a style="text-decoration: none; color: inherit;" href="index.php?controller=controllerLogin&action=displayRegister">Inscription</a></button>
                  </div>

                    <?php
                    if(isset($messageErreur) && $messageErreur != '') {
                        echo '<div class="form-check d-flex justify-content-center mb-4">' .
                        $messageErreur .
                        '</div>';
                    } ?>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>