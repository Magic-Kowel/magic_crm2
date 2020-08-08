<?php include '../conexion.php';

foreach ($_POST as $campo=> $valor) {
    $var="$".$campo."='". $valor."';";
    eval($var);
}
$sql="SELECT Nombre_cuest FROM `cuestionario` WHERE `Nombre_cuest` ='$cuestionario'";
$result=$con->query($sql);
$rows=$result->num_rows;
if($rows > 0) {
    echo 'Cuestionario ya Existe';
}
else {
    $query="INSERT INTO `cuestionario`(  `Nombre_cuest`, `Detalle_cuest`) VALUES ('$cuestionario', '$descripcionCuestionario')";
    $result=mysqli_query($con, $query);
    if ($result) {
        echo trim("success");
    }
    else {
        echo "fail";
    }
}
$con->close();
?>