<style>
    .nav-item:nth-child(4){
        background: rgba(31, 101, 126, 0.6);
    }
</style>
<section style="background-color: #eee; padding: 50px">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px; background: rgba(31, 101, 126, 0.4);">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Créer un Service</p>

                <form class="mx-1 mx-md-4" action="index.php?controller=controllerService&action=createdService" method="post" class="loginform" xmlns="http://www.w3.org/1999/html">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="dateStart">Date de début du service</label>
                      <input type="date" name="dateStart" class="form-control" placeholder="" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="dateEnd">Date de fin du service</label>
                      <input type="date" name="dateEnd" class="form-control" placeholder="" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="idTypeService">Type du service</label>
                      <select class="form-select" id="idTypeService" name="idTypeService">
                        <?php
                        foreach ($types_service as $type_service) {
                          echo "<option value={$type_service->getId()}>{$type_service->getName()}</option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-3">
                          <label for="Image" class="form-label">Votre image descriptif</label>
                          <input class="form-control" type="file" id="formFile" onchange="preview()">
                          <img id="frame" src="" class="img-fluid rounded" style="margin-top:20px" />
                      </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="price">Prix</label>
                      <input type="number" name="price" class="form-control" placeholder="Entrer un prix" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="title">Titre</label>
                      <input type="text" name="title" class="form-control" placeholder="Entrer un titre" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" maxlength="300" name="description" rows="3" cols="36" placeholder="Description"></textarea>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button class="btn btn-lg"  type="submit" class="btn btn-lg">Envoyer</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
      function preview() {
          frame.src = URL.createObjectURL(event.target.files[0]);
      }
  </script>
</section>
