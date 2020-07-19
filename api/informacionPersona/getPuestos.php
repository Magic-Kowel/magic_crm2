<?php 
include '../conexion.php';

foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
 }
$temporal = array();
$resultado = array();

$sel = $con->query("SELECT `Cod_pues`, `Cod_fk_dep1`, `Nombre_pues`, `Descripcion_pues` FROM `puesto`  ");

while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}

echo json_encode($resultado);

$sel->close();
$con->close();

?>
