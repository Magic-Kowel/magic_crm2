<?php 
include '../conexion.php';

foreach ($_POST as $campo => $valor) {
   $var = "$".$campo."='". $valor."';";
   eval($var);
}

$up = $con->prepare("UPDATE `puesto` SET  `Nombre_pues`= ?,`Descripcion_pues`= ?,`Cod_fk_dep1`= ? WHERE Cod_pues = ? ");
$up->bind_param("ssii",$Puesto,$DescripcionPuesto,$idDepartamento,$id);

if ($up->execute()) {
    echo "success";
} else {
    echo "fail";
}
$up->close();
$con->close();

?>