<?php 
include '../conexion.php';

foreach ($_POST as $campo => $valor) {
   $var = "$".$campo."='". $valor."';";
   eval($var);
}

    $nacimientoPersona=date('Y-m-d', strtotime( $_POST['fechaNacimiento']));
    $up = $con->prepare("UPDATE `persona` SET `Nombre_prsn`= ?,`Nacimiento_prsn`= ?,`Celular_prsn`= ? ,`Correo_prsn`= ? WHERE Cod_prsn = ? ");
    $up->bind_param("ssisi",$nombrePersona,$fechaNacimiento,$telefonoPersona,$correoPersona,$id);
    if ($up->execute()) {
        echo "success";
    } else {
        echo "fail";
    }

$up->close();
$con->close();

?>