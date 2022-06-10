<form id="form" action="index.php?controller=controllerService&action=createdService" method="POST"
      class="loginform    " xmlns="http://www.w3.org/1999/html">
  <div class="form-group">
    <label for="dateStart">Date de début du service</label>
    <input type="datetime-local" id="dateStart" name="dateStart">
  </div>
  <div class="form-group">
    <label for="dateEnd">Date de fin du service</label>
    <input type="datetime-local" id="dateEnd" name="dateEnd">
  </div>
  <div class="form-group">
    <label for="idTypeService">Type du service</label>
      <select class="form-select" id="idTypeService" name="idTypeService">
          <?php
          foreach ($types_service as $type_service) {
            echo "<option value={$type_service->getId()}>{$type_service->getName()}</option>";
          }
          ?>
      </select>
  </div>
  <div class="form-group">
    <label for="price">Prix</label>
    <input type="number" id="price" name="price" placeholder="Prix">
  </div>
  <div class="form-group">
    <label for="title">Titre</label>
    <input type="text" id="title" name="title" placeholder="Titre">
  </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea type="text" maxlength="333" rows="3" cols="50" id="description" name="description" placeholder="Description"></textarea>
    </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>