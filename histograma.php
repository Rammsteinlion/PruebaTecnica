

<?php require_once 'includes/header.php';?>

<?php require_once 'includes/menu.php';?>


<div class="container">
  <div class="jumbotron mt-3">
  <h1>Punto-2 Histograma</h1>
  <?php

$myArray = array(1,2,2,4,5,6,7,8,8,8);

$arr = array_count_values($myArray);

arsort($arr); 

$ocurences = reset($arr);
$mostFrequentNumber = key($arr);

echo "Longest: ".$ocurences."<br>";
echo "Number: ". $mostFrequentNumber.'<br>';
?>
  </div>


<?php require_once 'includes/footer.php';?>


