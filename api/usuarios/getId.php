<?php 
include '../conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));
$temporal = array();
$resultado = array();

$sel = $con->query("SELECT `Cod_usr`,Cod_perm,`Cod_fk_perm`,Nombre_perm,`Nickname_usr`,`Clave_usr` FROM usuarios INNER JOIN permisos ON Cod_fk_perm=Cod_perm where Cod_usr='$id' ");

if ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}

echo json_encode($resultado[0]);

$sel->close();
$con->close();

?>