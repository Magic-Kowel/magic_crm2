<?php 
include '../conexion.php';
foreach ($_GET as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
$temporal = array();
$resultado = array();
$sel = $con->query("SELECT `Cod_resp`,`Abierta_resp`,Tipo_preg FROM resultado_preg 
INNER JOIN preguntas on `Cod_fk_preg2` =Cod_preg 
WHERE Tipo_preg=0 and Cod_preg='$id' ORDER BY `resultado_preg`.`Cod_resp` DESC");

while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}
echo json_encode($resultado);
$sel->close();
$con->close();

?>

