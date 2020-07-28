<?php 
include '../conexion.php';

$temporal = array();
$resultado = array();

$sel = $con->query("SELECT  Cod_prsnl,Cod_fk_pues,Nombre_prsn,Nacimiento_prsn,Celular_prsn,Correo_prsn,Nombre_pues,Nombre_dep, Nickname_usr 
FROM personal 
INNER JOIN persona ON `Cod_fk_prsn`= Cod_prsn
INNER JOIN puesto ON Cod_fk_pues= Cod_pues
INNER JOIN usuarios ON `Cod_fk_usr2`= Cod_usr
INNER JOIN departamento ON Cod_dep=Cod_fk_pues");
// consilta de frank $sel = $con->query("SELECT Cod_prsnl,Cod_fk_pues,Nombre_prsn,Nacimiento_prsn,Celular_prsn,Correo_prsn,Nombre_pues,Nombre_dep, Nickname_usr FROM personal JOIN persona ON Cod_prsn=Cod_prsnl JOIN puesto ON Cod_pues=Cod_prsn RIGHT JOIN departamento ON Cod_dep=Cod_fk_pues JOIN usuarios ON Cod_usr=Cod_prsn");

while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}

echo json_encode($resultado);

$sel->close();
$con->close();

?>

