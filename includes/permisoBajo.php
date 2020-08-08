<?php
    if ($_SESSION['permiso']==1 || $_SESSION['permiso']==3) {
    }else{
        header("location:../index.php");
    }
?>