<?php 
include '../conexion.php';
$idCanalizacion = $con->real_escape_string(htmlentities($_GET['id']));
$temporal = array();
$resultado = array();

$sel = $con->query("SELECT `Cod_can`,Cod_ate,Nombre_dep, Nickname_usr,captura ,Estado_ate FROM `canalizacion` INNER JOIN usuarios on `Cod_fk_usr1`= Cod_usr INNER JOIN departamento on `Cod_fk_dep2`= Cod_dep RIGHT JOIN atencion on Cod_can = Cod_fk_can WHERE Cod_fk_repo1 ='$idCanalizacion'");
//$sel = $con->query("SELECT Cod_can, Nickname_usr,Nombre_dep FROM canalizacion INNER JOIN usuarios ON `Cod_fk_usr1`=Cod_usr INNER JOIN departamento on `Cod_fk_dep2`=Cod_dep");
while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}

echo json_encode($resultado);

$sel->close();
$con->close();

?>
