<?php 
include '../conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
$query = "INSERT INTO `preguntas`(`Cod_fk_cuest1`, `Pregunta_preg`,Tipo_preg) VALUES  ('$idCuestionario', '$pregunta','$estado')";
$result = mysqli_query($con, $query);
if ($result) {
    echo trim("success");
} else {
    echo $query ;
}
$con->close();

?>