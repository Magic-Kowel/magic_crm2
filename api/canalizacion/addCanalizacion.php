<?php
@session_start();
include '../conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
$idUser= $_SESSION['idUser'];
$idAtencion= $_GET['idAtencion'];
//if (isset($_POST['save_task'])) {
    $query = "INSERT INTO `canalizacion` (`Cod_fk_usr1`, `Cod_fk_dep2`) VALUES  ('$idUser', '$idDepartamento')";
    $result = mysqli_query($con, $query);
    
    $idCanalizacion=mysqli_insert_id($con);
    $query = "UPDATE `atencion` SET `Cod_fk_can`= '$idCanalizacion' WHERE Cod_ate='$idAtencion'";
    $result = mysqli_query($con, $query);
if ($result) {
    echo "success";
} else {
    echo  $query ;
}

//}

?>
