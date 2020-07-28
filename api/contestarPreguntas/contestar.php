<?php

include '../conexion.php';
foreach ($_GET as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
    $query = "INSERT INTO `respsel_preguntas`(`Cod_fk_preg1`) VALUES  ('$id')";
    $result = mysqli_query($con, $query);
if ($result) {
    echo "success";
} else {
    echo  "fail" ;
}

?>
