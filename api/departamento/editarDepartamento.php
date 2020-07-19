<?php 
include '../conexion.php';

foreach ($_POST as $campo => $valor) {
   $var = "$".$campo."='". $valor."';";
   eval($var);
}

$up = $con->prepare("UPDATE `departamento` SET `Nombre_dep`= ?,`Descripcion_dep`= ? WHERE Cod_dep = ? ");
$up->bind_param("ssi",$Departamento,$DescripcionDepartamento,$id);

if ($up->execute()) {
    echo "success";
} else {
    echo "fail";
}
$up->close();
$con->close();

?>