<?php 
include '../conexion.php';

$temporal = array();
$resultado = array();

$sel = $con->query("SELECT * FROM `usuarios` WHERE `Cod_usr` not in(SELECT Cod_fk_usr2 FROM personal)");

while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}
echo json_encode($resultado);
$sel->close();
$con->close();

?>

