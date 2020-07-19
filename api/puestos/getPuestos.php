<?php 
include '../conexion.php';

$temporal = array();
$resultado = array();

$sel = $con->query("SELECT Cod_pues,Cod_fk_dep1,Nombre_dep,Nombre_pues,Descripcion_pues FROM puesto INNER JOIN departamento ON Cod_fk_dep1=Cod_dep");

while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}
echo json_encode($resultado);
$sel->close();
$con->close();

?>

