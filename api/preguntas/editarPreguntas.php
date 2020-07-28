<?php 
include '../conexion.php';

foreach ($_POST as $campo => $valor) {
   $var = "$".$campo."='". $valor."';";
   eval($var);
}
$up = $con->prepare("UPDATE `preguntas` SET `Pregunta_preg`= ? WHERE Cod_preg = ? ");
$up->bind_param("si",$pregunta,$id);
if ($up->execute()) {
    echo trim("success");
} else {
    echo "fail";
}
$up->close();
$con->close();

?>