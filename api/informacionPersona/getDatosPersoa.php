<?php 
include '../conexion.php';

$temporal = array();
$resultado = array();

$sel = $con->query("SELECT Cod_prsn,Nombre_prsn FROM `persona` WHERE `Cod_prsn` not in(SELECT Cod_fk_prsn FROM personal)");

while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}
echo json_encode($resultado);
$sel->close();
$con->close();

?>
