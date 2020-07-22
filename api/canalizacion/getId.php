<?php 
include '../conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));
$temporal = array();
$resultado = array();

$sel = $con->query("SELECT Cod_can, Cod_fk_usr1, Cod_fk_dep2, Nickname_usr,Nombre_dep FROM canalizacion INNER JOIN usuarios ON `Cod_fk_usr1`=Cod_usr INNER JOIN departamento on `Cod_fk_dep2`=Cod_dep where Cod_can='$id'");

if ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}

echo json_encode($resultado[0]);

$sel->close();
$con->close();

?>