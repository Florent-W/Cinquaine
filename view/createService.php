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
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">Date de début</th>
      <th scope="col">Date de fin</th>
      <th scope="col">id_type_service</th>
      <th scope="col">Prix</th>
      <th scope="col">id utilisateur</th>
      <th scope="col">Titre</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
      <?php
  foreach($services as $number => $service) {
    $number += 1;
    $id_service = $service->getId();

    echo "
    <tr>
      <th scope='row'>$number</th>
      <td>$id_service</td>
      <td>{$service->getDateStart()}</td>
      <td>{$service->getDateEnd()}</td>
      <td>{$service->getIdTypeService()}</td>
      <td>{$service->getPrice()}</td>
      <td>{$service->getIdUser()}</td>
      <td>{$service->getTitle()}</td>
      <td><a type='button' href='index.php?controller=controllerService&action=deleteService&id=$id_service' class='btn btn-danger'>Supprimer</a>
      </td>
    </tr>
    ";
    }
?>
  </tbody>
</table>