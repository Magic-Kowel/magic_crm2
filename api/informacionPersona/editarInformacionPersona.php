<?php 
include '../conexion.php';

foreach ($_POST as $campo => $valor) {
   $var = "$".$campo."='". $valor."';";
   eval($var);
}

$up = $con->prepare("UPDATE `personal` SET `Cod_fk_pues` = ? WHERE `Cod_prsnl` = ?");
$up->bind_param("ii",$idPuesto,$id);

if ($up->execute()) {
    echo "success";
} else {
    echo "fail";
}
$up->close();
$con->close();

?>