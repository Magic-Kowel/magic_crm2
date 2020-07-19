<?php 
include '../conexion.php';

foreach ($_POST as $campo => $valor) {
   $var = "$".$campo."='". $valor."';";
   eval($var);
}

$up = $con->prepare("UPDATE `usuarios` SET `Cod_fk_perm`= ?,`Nickname_usr`= ?,`Clave_usr`= ? WHERE Cod_usr = ? ");
$up->bind_param("issi",$idPermiso,$nombreUsuario,$claveUsuario,$id);

if ($up->execute()) {
    echo "success";
} else {
    echo "fail";
}
$up->close();
$con->close();

?>