<?php 
include '../conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
$idPregunta = htmlentities($_GET['id']);
$query = "INSERT INTO `respsel_preguntas`(`Cod_fk_preg1`, `Respuesta_rsp`) VALUES  ('$idPregunta', '$opcion')";
$result = mysqli_query($con, $query);
if ($result) {
    echo trim("success");
} else {
    echo $query ;
}
$con->close();

?>