<?php 
include '../conexion.php';
$id = htmlentities($_GET['id']);

$del = $con->prepare("DELETE FROM `permisos` WHERE Cod_perm = ? ");
$del->bind_param("i",$id);

if ($del->execute()) {
    echo trim("success");
} else {
    echo trim("fail");
}
$del->close();
$con->close();

?>