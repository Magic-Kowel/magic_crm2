<?php

include '../conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
$nacimientoPersona=date('Y-m-d', strtotime( $_POST['nacimientoPersona']));

$sql="SELECT Correo_prsn FROM `persona` WHERE `Correo_prsn` ='$coreoPersona'";
$result=$con->query($sql);
$rows=$result->num_rows;
if($rows > 0) {
    echo 'Correo ya Existe ';
}
else {
    $query = "INSERT INTO `persona`( `Nombre_prsn`, `Nacimiento_prsn`, `Celular_prsn`, `Correo_prsn`) VALUES ('$nombrePersona', '$nacimientoPersona', '$celularPersona','$coreoPersona')";
    $result = mysqli_query($con, $query);
    if ($result) {
      echo trim("success");
    } else {
        echo  $result ;
    }
}
?>
