<?php 
include '../conexion.php';
$id = htmlentities($_GET['id']);

$del = $con->prepare("DELETE FROM `usuarios` WHERE Cod_usr = ? ");
$del->bind_param("i",$id);

if ($del->execute()) {
    echo trim("success");
} else {
    echo trim("fail");
}
$del->close();
$con->close();

?>