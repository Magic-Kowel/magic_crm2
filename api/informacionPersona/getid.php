<?php 
include '../conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));
$temporal = array();
$resultado = array();

$sel = $con->query("SELECT Cod_prsnl,Cod_pues,Nombre_prsn,Nacimiento_prsn,Celular_prsn,Correo_prsn,Nombre_pues,Nombre_dep, Nickname_usr FROM personal JOIN persona ON Cod_prsn=Cod_prsnl JOIN puesto ON Cod_pues=Cod_prsn RIGHT JOIN departamento ON Cod_dep=Cod_fk_pues JOIN usuarios ON Cod_usr=Cod_prsn where Cod_prsnl='$id' ");

if ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}

echo json_encode($resultado[0]);

$sel->close();
$con->close();

?>