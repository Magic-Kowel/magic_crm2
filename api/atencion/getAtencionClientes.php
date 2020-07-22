<?php 
include '../conexion.php';

$temporal = array();
$resultado = array();

$sel = $con->query("SELECT Cod_ate,Cod_repo,Tiempo_ate,Estado_Ate,Detalle_repo,Contrato_repo FROM atencion RIGHT JOIN reportes ON Cod_repo=Cod_ate");

while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}

echo json_encode($resultado);

$sel->close();
$con->close();

?>
