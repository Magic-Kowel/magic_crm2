<?php
@session_start();

include '../conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
$idUser= $_SESSION['idUser'];
//if (isset($_POST['save_task'])) {

$query = "INSERT INTO `mensaje`(`Cod_fk_usr3`, `Comentario_mnsj`) VALUES   ('$idUser', '$Comentario')";
$result = mysqli_query($con, $query);
$idMesaje=mysqli_insert_id($con);
$query = "INSERT INTO `hiloreporte`(`Cod_fk_repo2`, `Cod_fk_mnsj`) VALUES  ('$idReporte', '$idMesaje')";
$result = mysqli_query($con, $query);
if ($result) {
    echo "success";
} else {
    echo  "fail" ;
}

//}

?>