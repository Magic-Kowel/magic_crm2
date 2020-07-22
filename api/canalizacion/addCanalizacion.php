<?php

include '../conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
 }

//if (isset($_POST['save_task'])) {
  
  $query = "INSERT INTO `canalizacion` (`Cod_fk_usr1`, `Cod_fk_dep2`) VALUES  ('$idUsuarios', '$idDepartamento')";
  $result = mysqli_query($con, $query);

if ($result) {
    echo "success";
} else {
    echo  "fail" ;
}

//}

?>
