<?php 
include '../conexion.php';
$temporal = array();
$resultado = array();

$sel = $con->query("SELECT * FROM `cuestionario` ORDER BY `Cod_cuest` DESC ");
while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}

echo json_encode($resultado);

$sel->close();
$con->close();

?>
