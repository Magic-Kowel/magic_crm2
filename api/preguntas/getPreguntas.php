<?php 
include '../conexion.php';
$temporal = array();
$resultado = array();
$id = $con->real_escape_string(htmlentities($_GET['id']));
$sel = $con->query("SELECT * FROM preguntas where Cod_fk_cuest1= '$id' ORDER BY `Cod_preg` ASC ");
while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}

echo json_encode($resultado);

$sel->close();
$con->close();

?>
