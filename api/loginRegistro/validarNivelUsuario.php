<?php 
include '../conexion.php';
@session_start();
$usuario=$_SESSION['user'];
$temporal = array();
$resultado = array();
$sel = $con->query("SELECT `Cod_fk_perm` FROM `usuarios` WHERE `Nickname_usr` ='$usuario' ");
if ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}
echo json_encode($resultado[0]);

$sel->close();
$con->close();

?>