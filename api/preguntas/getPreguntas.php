<?php 
include '../conexion.php';
$temporal = array();
$resultado = array();
$id = $con->real_escape_string(htmlentities($_GET['id']));
$sel = $con->query("SELECT * ,Nombre_cuest FROM `preguntas` INNER JOIN cuestionario ON Cod_cuest=`Cod_fk_cuest1` where Cod_fk_cuest1='$id'");
while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}

echo json_encode($resultado);

$sel->close();
$con->close();

?>
