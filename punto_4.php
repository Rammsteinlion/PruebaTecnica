<?php require_once 'includes/header.php'; ?>

<?php require_once 'includes/menu.php'; ?>

<?php
$query = "SELECT * FROM appx_department WHERE id =(SELECT department_id from app_employee WHERE  id  IN
(SELECT max(department_id) FROM app_employee))";

$stmt = $DBcon->prepare($query);
$stmt->execute();
?>

<div class="container">
  <div class="jumbotron mt-3">
    <h1>Punto -4</h1>
    <!-- BUTTON SQL -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
      MostrarConsulta
    </button>
    <!-- BUTTON JSON -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#json">
      Consulta JSON
    </button>
    <br> <br>
    <?php
    $emp = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $id = $row['id'];
      $department = $row['department_name'];

      $emp['empleados'][] = $row;
    }

    ?>

    <table class="table">
      <thead class="thead-dark thead-md-6">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">department_name</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <tr>
          <td><?= $id; ?></td>
          <td><?= $department; ?></td>
        </tr>
        </tr>
      </tbody>
    </table>
  </div>





  <!-- Modal  SQL-->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Consulta Sql</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>SELECT * FROM appx_department WHERE id = (SELECT department_id from app_employee WHERE id IN
            (SELECT max(department_id) FROM app_employee ))</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal JSON -->
  <div class="modal fade" id="json" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Respuesta JSon</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo json_encode($emp); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <?php require_once 'includes/footer.php'; ?>