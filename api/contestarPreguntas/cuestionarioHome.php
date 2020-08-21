<?php
include '../conexion.php';
$idPregrunta=27;
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
    $query = "INSERT INTO `resultado_preg`(`Cod_fk_cuest2`, `Cod_fk_preg2`, `Abierta_resp`) VALUES  ('4','27', '$empresa');";
    $query .= "INSERT INTO `resultado_preg`(`Cod_fk_cuest2`, `Cod_fk_preg2`, `Abierta_resp`) VALUES  ('4','28', '$nombre');";
    $query .= "INSERT INTO `resultado_preg`(`Cod_fk_cuest2`, `Cod_fk_preg2`, `Abierta_resp`) VALUES  ('4','29', '$ciudad');";
    $query .= "INSERT INTO `resultado_preg`(`Cod_fk_cuest2`, `Cod_fk_preg2`, `Abierta_resp`) VALUES  ('4','30', '$correo');";
    $query .= "INSERT INTO `resultado_preg`(`Cod_fk_cuest2`, `Cod_fk_preg2`, `Abierta_resp`) VALUES  ('4','31', '$telefono');";
    $result = mysqli_multi_query($con, $query);
    if ($result) {
        echo "success";
    } else {
        echo  $query ;
    }
    
?>
