<?php 
include '../conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));
$temporal = array();
$resultado = array();
$sel = $con->query("SELECT * FROM `respsel_preguntas` WHERE `Cod_rsp` ='$id' ");
if ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}
echo json_encode($resultado[0]);
$sel->close();
$con->close();

?>