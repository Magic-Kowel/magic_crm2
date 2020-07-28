<?php 
include '../conexion.php';

foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
$query = "INSERT INTO `cuestionario`(  `Nombre_cuest`, `Detalle_cuest`) VALUES ('$cuestionario', '$descripcionCuestionario')";
$result = mysqli_query($con, $query);
if ($result) {
    echo trim("success");
} else {
    echo "fail";
}
$con->close();

?>