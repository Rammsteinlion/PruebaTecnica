<?php require_once 'includes/header.php';?>

<?php require_once 'includes/menu.php';?>

<?php 

$query ="SELECT COUNT(emp.id)AS 'usuario',SUM(emp.salary)AS 'salarios',dep.department_name,edu.description
from app_employee emp
 JOIN appx_department dep on dep.id = emp.department_id
 JOIN appx_educationlevel edu  on edu.id = emp.educationlevel_id
GROUP  BY emp.department_id,emp.educationlevel_id";
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
  Consulta JSON
</button>
<br><br>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Users</th>
      <th scope="col">Salary</th>
      <th scope="col">Department Name</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <?php
$emp = array();

while ($row=$stmt->fetch(PDO::FETCH_ASSOC)):
        $usuario=$row['usuario'];
       $salarios=$row['salarios'];
       $department_name=$row['department_name'];
       $description=$row['description'];

       $emp['empleados'][]=$row;
 //echo json_encode($emp);
 
 ?>
  <tbody>
    <tr>
      <th scope="row"><?=$usuario;?></th>
      <td><?=$salarios;?></td>
      <td><?=$department_name;?></td>
      <td><?=$description;?></td>
    </tr>
  </tbody>
  <?php endwhile; ?>
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
        <p>SELECT COUNT(emp.id)AS 'usuario',SUM(emp.salary)AS 'salarios',dep.department_name,edu.description
from app_employee emp
 JOIN appx_department dep on dep.id = emp.department_id
 JOIN appx_educationlevel edu  on edu.id = emp.educationlevel_id
GROUP  BY emp.department_id,emp.educationlevel_id</p>
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

<?php require_once 'includes/footer.php';?>
