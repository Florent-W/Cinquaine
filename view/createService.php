<form id="form" action="index.php?controller=controllerService&action=createdService" method="POST" class="loginform    ">
  <div class="form-group">
    <label for="dateStart">Start Date</label>
    <input type="datetime-local" id="dateStart" name="dateStart">
  </div>
  <div class="form-group">
    <label for="dateEnd">End Date</label>
    <input type="datetime-local" id="dateEnd" name="dateEnd">
  </div>
  <div class="form-group">
    <label for="idTypeService">Service Type</label>
      <select class="form-select" id="idTypeService" name="idTypeService">
          <?php
          foreach ($types_service as $type_service) {
            echo "<option value={$type_service->getId()}>{$type_service->getName()}</option>";
          }
          ?>
      </select>
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" id="price" name="price" placeholder="Price">
  </div>
  <div class="form-group">
    <label for="idUser">User</label>
      <select class="form-select" id="idUser" name="idUser">
          <?php foreach ($users as $user) {
              echo "<option value={$user->getId()}>{$user->getName()}</option>";
          }
          ?>
      </select>  </div>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" id="title" name="title" placeholder="Title">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">id</th>
      <th scope="col">date_start</th>
      <th scope="col">date_end</th>
      <th scope="col">id_type_service</th>
      <th scope="col">price</th>
      <th scope="col">id_user</th>
      <th scope="col">title</th>
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