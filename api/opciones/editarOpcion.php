<?php 
include '../conexion.php';
foreach ($_POST as $campo => $valor) {
   $var = "$".$campo."='". $valor."';";
   eval($var);
}
$up = $con->prepare("UPDATE `respsel_preguntas` SET  `Respuesta_rsp`= ? WHERE `Cod_rsp`=?");
$up->bind_param("si",$opcion,$id);
if ($up->execute()) {
    echo trim("success");
} else {
    echo "fail";
}
$up->close();
$con->close();

?>