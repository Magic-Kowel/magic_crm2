<?php 
include '../conexion.php';

$temporal = array();
$resultado = array();

$sel = $con->query("SELECT Cod_can, Nickname_usr,Nombre_dep FROM canalizacion INNER JOIN usuarios ON `Cod_fk_usr1`=Cod_usr INNER JOIN departamento on `Cod_fk_dep2`=Cod_dep");

while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}

echo json_encode($resultado);

$sel->close();
$con->close();

?>
