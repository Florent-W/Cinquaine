<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Inscription</p>

                <form class="mx-1 mx-md-4" action="index.php?action=register&controller=controllerLogin" method="post" class="loginform">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="uname">Votre nom</label>
                      <input type="text" name="uname" class="form-control" placeholder="Entrer votre nom" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="email">Votre adresse mail</label>
                      <input type="email" name="email" class="form-control" placeholder="Entrer votre adresse mail" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="psw">Votre mot de passe</label>
                      <input type="password" name="psw" class="form-control" placeholder="Entrer votre mot de passe" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-5">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="phone_number">Votre numéro de téléphone</label>
                      <input type="tel" name="phone_number" class="form-control" pattern="[0-9]{10}" required placeholder="Entrer votre numéro de téléphone" />
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn btn-primary btn-lg"  type="submit" class="btn btn-primary btn-lg">S'inscrire</button>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>