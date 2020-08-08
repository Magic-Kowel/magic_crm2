<?php 
    if ($_SESSION['permiso']!=1) {
        header("location:../index.php");
    }
?>