<?php @session_start();
$con = new mysqli('localhost','root','','dbcrm');
if ($con->connect_errno) {
    die("La conexion no pudo establecerse");
}
 ?>