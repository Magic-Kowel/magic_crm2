<?php

include '../conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}

//if (isset($_POST['save_task'])) {
$sql="SELECT Nombre_perm FROM `permisos` where Nombre_perm='$permiso'";
$result=$con->query($sql);
$rows=$result->num_rows;
if($rows > 0) {
  echo 'Permiso ya existe';
}else {
  $query = "INSERT INTO `permisos`(`Nombre_perm`, `Descrpcion_perm`) VALUES ('$permiso', '$descripcionPermiso')";
  $result = mysqli_query($con, $query);
  if ($result) {
    echo trim("success");
  }else {
    echo "fail";
  }
}
//}
$con->close();
?>
