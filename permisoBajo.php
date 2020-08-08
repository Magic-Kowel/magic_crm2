<?php 
    if (!isset($_SESSION['permiso'])!=1||!isset($_SESSION['permiso'])!=3 ) {
        header("location:../index.php");
    }
?>