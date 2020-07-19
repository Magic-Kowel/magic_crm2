<?php

include '../conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
 }

//if (isset($_POST['save_task'])) {
  
  $query = "INSERT INTO `usuarios`( `Cod_fk_perm`, `Nickname_usr`, `Clave_usr`) VALUES ('$idPermiso', '$nombreUsuario','$claveUsiario')";
  $result = mysqli_query($con, $query);

if ($result) {
    echo "success";
} else {
    echo "fail";
}

//}

?>
