<?php 
include '../conexion.php';

$temporal = array();
$resultado = array();

$sel = $con->query("SELECT `Cod_usr`,`Cod_fk_perm`,Nombre_perm,`Nickname_usr`,`Clave_usr` FROM usuarios INNER JOIN permisos ON Cod_fk_perm=Cod_perm");

while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}
echo json_encode($resultado);
$sel->close();
$con->close();

?>

