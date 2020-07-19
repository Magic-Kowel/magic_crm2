<?php 
include '../conexion.php';

foreach ($_POST as $campo => $valor) {
   $var = "$".$campo."='". $valor."';";
   eval($var);
}

$up = $con->prepare("UPDATE `permisos` SET `Nombre_perm`= ?,`Descrpcion_perm`= ? WHERE Cod_perm = ? ");
$up->bind_param("ssi",$Permiso,$DescripcionPermiso,$id);

if ($up->execute()) {
    echo "success";
} else {
    echo "fail";
}
$up->close();
$con->close();

?>