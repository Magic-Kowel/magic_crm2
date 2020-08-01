
<?php
include '../conexion.php';
foreach ($_GET as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
//setting header to json
header('Content-Type: application/json');
//query to get data from the table
$query = sprintf("SELECT Nombre_cuest,Pregunta_preg,Respuesta_rsp,count(Cod_fk_rsp) as conteo,Tipo_preg FROM `resultado_preg`INNER JOIN cuestionario on `Cod_fk_cuest2`=Cod_cuest INNER JOIN preguntas on `Cod_fk_preg2`=Cod_preg INNER JOIN respsel_preguntas on `Cod_fk_rsp`=Cod_rsp where Tipo_preg=1 and Cod_fk_preg1='$idPregunta' GROUP by Respuesta_rsp");
//execute query
$result = $con->query($query);
//loop through the returned data
$data = array();
foreach ($result as $row) {
  $data[] = $row;
}
//free memory associated with result
$result->close();
//close connection
$con->close();
//now print the data
print json_encode($data);