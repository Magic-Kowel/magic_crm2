<?php

include '../conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
 }

//if (isset($_POST['save_task'])) {
  
  $query = "INSERT INTO `personal`( `Cod_fk_pues`, `Cod_fk_prsn`, `Cod_fk_usr2`) VALUES  ('$idPuesto', '$idPersona','$idUsuario')";
  $result = mysqli_query($con, $query);

if ($result) {
    echo "success";
} else {
    echo  $query ;
}

//}

?>
