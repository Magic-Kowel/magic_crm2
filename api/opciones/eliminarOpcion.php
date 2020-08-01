<?php 
include '../conexion.php';
$id = htmlentities($_GET['id']);
$del = $con->prepare("DELETE FROM `respsel_preguntas` WHERE Cod_rsp = ? ");
$del->bind_param("i",$id);
if ($del->execute()) {
    echo trim("success");
} else {
    echo trim("fail");
}
$del->close();
$con->close();

?>