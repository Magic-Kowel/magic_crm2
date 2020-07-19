<?php 
include '../conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
$email = $con ->real_escape_string(htmlentities($_POST['email']));
$pass = $con ->real_escape_string(htmlentities($_POST['pass']));

$sel = $con->query("SELECT `Nickname_usr`, `Clave_usr` FROM usuarios WHERE Nickname_usr = '$email' ");

if ($f = $sel->fetch_assoc()) {
   $correo = $f['Nickname_usr'];
   $password = $f['Clave_usr'];
   $user = $f['Nickname_usr'];
  
}

$passEncriptada = password_verify($pass,$password);

if ($email == $correo && $pass ==$password) {
    $_SESSION['user'] = $user;
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