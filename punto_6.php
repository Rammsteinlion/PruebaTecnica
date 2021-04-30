

<?php require_once 'includes/header.php';?>

<?php require_once 'includes/menu.php';?>

<?php 

$query ="SELECT id,firstname,lastname,salary from app_employee";
$stmt =$DBcon->prepare($query);
$stmt->execute();



?>

<div class="container">
  <div class="jumbotron mt-3">
  <h1>PUNTO-6</h1>

        <!-- BUTTON SQL -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  MostrarConsulta
</button>
<!-- BUTTON JSON -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#json">
  Consulta Trigger
</button>
<br><br>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">firstname</th>
      <th scope="col">lastname</th>
      <th scope="col">salary</th>
    </tr>
  </thead>
  <?php
$emp = array();

while ($row=$stmt->fetch(PDO::FETCH_ASSOC)):
        $id=$row['id'];
       $firstname=$row['firstname'];
       $lastname=$row['lastname'];
       $salary=$row['salary'];
       $emp['empleados'][] = $row;
 ?>
  <tbody>
    <tr>
      <th scope="row"><?=$id;?></th>
      <td><?=$firstname;?></td>
      <td><?=$lastname;?></td>
      <td><?=$salary;?></td>
    </tr>
  </tbody>
  <?php endwhile; ?>
</table>
    

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
          <p>SELECT id,firstname,lastname,salary from app_employee</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

    <!-- Modal trigger -->
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
          <p>CREATE TRIGGER `tr_insert` 
BEFORE INSERT ON app_employee 
FOR EACH ROW 
UPDATE app_employee SET salary=90825 WHERE firstname LIKE '%ale%'</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>



<?php require_once 'includes/footer.php';?>







