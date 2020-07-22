<?php 
include '../conexion.php';

foreach ($_POST as $campo => $valor) {
   $var = "$".$campo."='". $valor."';";
   eval($var);
}
$up = $con->prepare("UPDATE `canalizacion` SET `Cod_fk_usr1`= ?,`Cod_fk_dep2`= ?  WHERE Cod_can = ? ");
$up->bind_param("iii",$idUsuarios,$idDepartamento,$id);

if ($up->execute()) {
    echo "success";
} else {
    echo "fail";
}
$up->close();
$con->close();

?>