<?php 
include '../conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
$email = $con ->real_escape_string(htmlentities($_POST['email']));
$pass = $con ->real_escape_string(htmlentities($_POST['pass']));

$sel = $con->query("SELECT Cod_usr,Cod_fk_perm, `Nickname_usr`, `Clave_usr` FROM usuarios WHERE Nickname_usr = '$email' ");

if ($f = $sel->fetch_assoc()) {
    $correo = $f['Nickname_usr'];
    $password = $f['Clave_usr'];
    $user = $f['Nickname_usr'];
    $idUser=$f['Cod_usr'];
    $permiso=$f['Cod_fk_perm'];
}
$passEncriptada = password_verify($pass,$password);
if ($email == $correo && $passEncriptada ==$password) {
    $_SESSION['user'] = $user;
    $_SESSION['idUser'] = $idUser;
    $_SESSION['permiso'] = $permiso;
    echo "success";
} else {
    echo "fail";
}
$sel->close();
$con->close();
}
else{
    header("location:../../index.php");
}
?>