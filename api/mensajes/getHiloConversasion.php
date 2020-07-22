
<?php 
include '../conexion.php';

foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
$id = $con->real_escape_string(htmlentities($_GET['id']));
$temporal = array();
$resultado = array();

$sel = $con->query("SELECT Tiempo_hr ,`Contrato_repo`,`Detalle_repo`, Comentario_mnsj,Nickname_usr 
FROM `hiloreporte`
INNER JOIN  reportes
on Cod_fk_repo2 = `Cod_repo` 
INNER JOIN mensaje on Cod_fk_mnsj= Cod_mnsj
INNER JOIN usuarios on Cod_usr=Cod_fk_usr3
WHERE Cod_repo ='$id' 
ORDER BY `Tiempo_hr`  DESC");

while ($f = $sel->fetch_assoc()) {
    $temporal = $f;
    array_push($resultado, $temporal);
}

echo json_encode($resultado);

$sel->close();
$con->close();

?>
