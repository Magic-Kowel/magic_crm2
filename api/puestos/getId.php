<?php 
include '../conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));
$temporal = array();
$resultado = array();

$sel = $con->query("SELECT Cod_dep,Cod_pues,Nombre_dep,Nombre_pues,Descripcion_pues FROM departamento INNER JOIN puesto ON Cod_fk_dep1=Cod_dep WHERE `Cod_pues` ='$id' ");

if ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}

echo json_encode($resultado[0]);

$sel->close();
$con->close();

?>