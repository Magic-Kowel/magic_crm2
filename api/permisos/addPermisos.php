<?php

include '../conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
 }

//if (isset($_POST['save_task'])) {
  
  $query = "INSERT INTO `permisos`(`Nombre_perm`, `Descrpcion_perm`) VALUES ('$permiso', '$descripcionPermiso')";
  $result = mysqli_query($con, $query);
  if(!$result) {
    die("Query Failed.");
  }
  header('Location: index.php');

//}

?>
