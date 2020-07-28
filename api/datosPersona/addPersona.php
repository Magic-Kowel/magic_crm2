<?php

include '../conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
 }
 $nacimientoPersona=date('Y-m-d', strtotime( $_POST['nacimientoPersona']));
//if (isset($_POST['save_task'])) {
  
  $query = "INSERT INTO `persona`( `Nombre_prsn`, `Nacimiento_prsn`, `Celular_prsn`, `Correo_prsn`) VALUES ('$nombrePersona', '$nacimientoPersona', '$celularPersona','$coreoPersona')";
  $result = mysqli_query($con, $query);
  if ($result) {
    echo trim("success");
} else {
    echo  $result ;
}

//}

?>
