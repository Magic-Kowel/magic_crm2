
<?php 
session_start();
if (!isset($_SESSION['user']) && !isset($_SESSION['permiso'])) {
    header("location:../index.php");
}else{
    
}
?>