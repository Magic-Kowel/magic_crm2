<?php 
include '../conexion.php';

$temporal = array();
$resultado = array();

$sel = $con->query("SELECT Cod_ate,Cod_repo,Cod_fk_repo1,Tiempo_ate,Estado_Ate,Detalle_repo,Contrato_repo FROM atencion INNER JOIN reportes ON Cod_repo=Cod_fk_repo1  ORDER BY  `Tiempo_ate` DESC");

while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}

echo json_encode($resultado);

$sel->close();
$con->close();

?>
