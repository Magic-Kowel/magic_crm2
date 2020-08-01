<?php

include '../conexion.php';

//if (isset($_POST['save_task'])) {
  $idDepartamento = $_POST['idDepartamento'];
  $nombrePuesto = $_POST['nombrePuesto'];
  $descripcionPuesto = $_POST['descripcionPuesto'];
  $sql="SELECT Nombre_pues FROM `puesto` where Nombre_pues='$nombrePuesto'";
  $result=$con->query($sql);
  $rows=$result->num_rows;
  if($rows > 0) {
    echo 'Puesto ya existe';
  }else {
    $query = "INSERT INTO `puesto`(`Cod_fk_dep1`, `Nombre_pues`, `Descripcion_pues`) VALUES ('$idDepartamento', '$nombrePuesto', '$descripcionPuesto')";
    $result = mysqli_query($con, $query);
    if ($result) {
      echo trim("success");
    }else {
      echo "fail";
    }
  }
//}

?>
