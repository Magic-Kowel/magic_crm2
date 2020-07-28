<?php 
include '../conexion.php';

foreach ($_POST as $campo => $valor) {
   $var = "$".$campo."='". $valor."';";
   eval($var);
}
$up = $con->prepare("UPDATE `cuestionario` SET `Nombre_cuest`= ?,`Detalle_cuest`= ? WHERE Cod_cuest = ? ");
$up->bind_param("ssi",$nombreCuestionario,$DescripcionCuestionario,$id);
if ($up->execute()) {
    echo trim("success");
} else {
    echo "fail";
}
$up->close();
$con->close();

?>