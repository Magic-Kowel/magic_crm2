<?php

include '../conexion.php';
foreach ($_POST as $campo => $valor) {
    $var = "$".$campo."='". $valor."';";
    eval($var);
}
$sql = "SELECT Nickname_usr FROM `usuarios` where Nickname_usr='$nombreUsuario'";
    $result=$con->query($sql);
    $rows = $result->num_rows;
    
    if($rows > 0) {
        echo 'Usuario ya existe';
    } else {
        $query = "INSERT INTO `usuarios`( `Cod_fk_perm`, `Nickname_usr`, `Clave_usr`) VALUES ('$idPermiso', '$nombreUsuario','$claveUsiario')";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            echo "success";
        } else {
            echo "fail";
        }
    }




?>
