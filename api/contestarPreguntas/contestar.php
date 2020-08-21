<?php

include '../conexion.php';
foreach ($_GET as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
    $query = "INSERT INTO `resultado_preg`(`Cod_fk_cuest2`, `Cod_fk_preg2`, `Cod_fk_rsp`) VALUES  ('$cuestionario','$pregrunta','$opcion')";
    $result = mysqli_query($con, $query);
if ($result) {
    echo "success";
} else {
    echo  $query ;
}
$con->close();
?>
