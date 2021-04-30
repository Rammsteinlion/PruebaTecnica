<?php require_once 'includes/header.php';?>

<?php require_once 'includes/menu.php';?>


<div class="container">
  <div class="jumbotron mt-3">
  <h1>Punto Matrix</h1>
  <?php
//incomplete
$myArray = array(
    array(1,2,9),
    array(2,5,3),
    array(5,1,5)
   );
$res;   
   for ($i = 0; $i < count($myArray); $i++) {
       for($n = 0; $n<count($myArray); $n++){
            $res = $myArray[$i][$n] + $myArray[$i][$n];
           if($res<=6){
               echo $myArray[$i][$n];
           }
           echo '<br/>';
           
       }
   }
?>
  </div>


<?php require_once 'includes/footer.php';?>
