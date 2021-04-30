<?php require_once 'includes/header.php';?>

<?php require_once 'includes/menu.php';?>

<?php 
$query ="SELECT emp.id,emp.lastname,edu.description, dep.department_name,emp.salary 
from app_employee emp 
INNER JOIN  appx_educationlevel edu  on edu.id = emp.id
 INNER JOIN appx_department dep on dep.id = emp.id
 WHERE emp.id IN
 (SELECT id from app_employee where emp.salary>= 250000)";

$stmt = $DBcon->prepare($query);
$stmt->execute();
?>
<div class="container">
  <div class="jumbotron mt-3">
  <h1>PUNTO-5</h1>

      <!-- BUTTON SQL -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  MostrarConsulta
</button>
<!-- BUTTON JSON -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#json">
  Consulta JSON
</button>
<br><br>
 <?php 
 $emp = array();

 while ($row=$stmt->fetch(PDO::FETCH_ASSOC)):
  $id=$row['id'];
        $lastname=$row['lastname'];
 
        $emp['empleados'][]=$row;
  //echo json_encode($emp);
  
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
          <td><?= $lastname; ?></td>
        </tr>
        </tr>
      </tbody>
    </table>
    <?php endwhile;?>
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
      <p>SELECT emp.id,emp.lastname,edu.description, dep.department_name,emp.salary 
from app_employee emp 
INNER JOIN  appx_educationlevel edu  on edu.id = emp.id
 INNER JOIN appx_department dep on dep.id = emp.id
 WHERE emp.id IN
 (SELECT id from app_employee where emp.salary>= 250000)</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>

<!-- Modal JSON -->
<div class="modal fade" id="json" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Respuesta JSon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p><?php echo json_encode($emp);?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<?php require_once 'includes/footer.php';?>
