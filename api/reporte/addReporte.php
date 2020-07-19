<?php

include '../conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
 }

//if (isset($_POST['save_task'])) {
  
  $query = "INSERT INTO `reportes`(  `Detalle_repo`, `Contrato_repo`) VALUES  ('$descripcionReporte', '$numeroContrato')";
  $result = mysqli_query($con, $query);

if ($result) {
    echo "success";
} else {
    echo  "fail" ;
}

//}

?>
