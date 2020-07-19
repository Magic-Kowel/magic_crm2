<?php

include '../conexion.php';

//if (isset($_POST['save_task'])) {
  $Departamento = $_POST['Departamento'];
  $DescripcionDepartamento = $_POST['DescripcionDepartamento'];
  $query = "INSERT INTO departamento(`Nombre_dep`, `Descripcion_dep`) VALUES ('$Departamento', '$DescripcionDepartamento')";
  $result = mysqli_query($con, $query);
  if(!$result) {
    die("Query Failed.");
  }
  header('Location: index.php');

//}

?>
