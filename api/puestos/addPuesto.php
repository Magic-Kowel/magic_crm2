<?php

include '../conexion.php';

//if (isset($_POST['save_task'])) {
  $idDepartamento = $_POST['idDepartamento'];
  $nombrePuesto = $_POST['nombrePuesto'];
  $descripcionPuesto = $_POST['descripcionPuesto'];
  $query = "INSERT INTO `puesto`(`Cod_fk_dep1`, `Nombre_pues`, `Descripcion_pues`) VALUES ('$idDepartamento', '$nombrePuesto', '$descripcionPuesto')";
  $result = mysqli_query($con, $query);
  if(!$result) {
    die("Query Failed.");
  }
  header('Location: index.php');

//}

?>
