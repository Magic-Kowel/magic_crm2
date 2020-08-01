<?php 
include '../conexion.php';

foreach ($_GET as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
$sel = $con->query("SELECT Estado_ate FROM atencion WHERE Cod_ate = '$id' ");
if ($f = $sel->fetch_assoc()) {
    $estado = $f['Estado_ate'];
}
if($estado==0){
    $estadoActualizado=1;
    $query="UPDATE `atencion` SET `Estado_ate`= $estadoActualizado WHERE Cod_ate = $id";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo 'success';
    } else {
        echo 'fail' ;
    }
    $con->close();
}else{
    echo "Estado ya fue cambiado";
}
//$up = $con->prepare("UPDATE `canalizacion` SET `Estado_ate`= ? WHERE Cod_ate = ? ");
//$up->bind_param("ii",$id,$id);

//$up->close();
?>