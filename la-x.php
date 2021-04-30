<?php require_once 'includes/header.php';?>

<?php require_once 'includes/menu.php';?>


<div class="container">
  <div class="jumbotron mt-3">
  <h1>Punto la X</h1>
  <br>
  <?php
//No validado para el caso $n = 6
$n = 5;
if($n == 0){
    echo "ERROR";
}

for($row = 1;$row <=$n; $row++ )
{

    for($column = 1; $column <= $n; $column++)
    {
        if((($column == $n or $column == 1) and ($row == 1 or $row==5)) or (($column == 2 or $column == 4 ) and ($row == 2 or $row == 4)) or ($column == 3 and $row == 3) )
        {
            echo "X";
        }
        else{
            echo "_";
        }

    }
    echo "<br>";

}
?>
  </div>


<?php require_once 'includes/footer.php';?>
