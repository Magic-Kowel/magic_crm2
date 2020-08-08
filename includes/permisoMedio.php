<?php 
    if ($_SESSION['permiso']==1 || $_SESSION['permiso']==2) {
    }else{
        header("location:../index.php");
    }
?>