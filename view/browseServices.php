<section class="py-5">
    <div class="container">
        <form class="form-inline" action="/recherche/" method="get">
          <fieldset>
            <div class="input-group">
              <div class="input-group-prepend">
                <select id="oCategorie" name="oCategorie" class="form-control" style="width:200px">
                  <option selected="selected" value="0">Catégorie</option>
                  <option value="1">Voyage</option>
                  <option value="5">Jeux</option>
                  <option value="3">Loisir</option>
                  <option value="4">Informatique</option>
                </select>
              </div>
              <input id="oSaisie" name="oSaisie" type="text" class="form-control" aria-label="Saisie de mots clés" required="required" placeholder="Saisie de mots clés . . .">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" style="width:200px">Recherche</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
                foreach($services as $service) {
                  echo "
                    <div class='col mb-5'>
                        <div class='card h-100'>
                            <!-- Product image-->
                            <img class='card-img-top' src='assets/css/dessin.jpg' alt='...' />
                            <!-- Product details-->
                            <div class='card-body p-4'>
                                <div class='text-center'>
                                    <!-- Product name-->
                                    <h5 class='fw-bolder'>{$service->getTitle()}</h5>
                                    <!-- Product reviews-->
                                    <div class='d-flex justify-content-center small text-warning mb-2'>
                                        <div class='bi-star-fill'></div>
                                        <div class='bi-star-fill'></div>
                                        <div class='bi-star-fill'></div>
                                        <div class='bi-star-fill'></div>
                                        <div class='bi-star-fill'></div>
                                    </div>
                                    <!-- Product price-->
                                    €{$service->getPrice()}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='#'>Ajouter au panier</a></div>
                            </div>
                        </div>
                    </div>
                    ";
                }
            ?>
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Session 2021-2022 Prism</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="assets/js/scripts.js"></script>
</body>
</html>