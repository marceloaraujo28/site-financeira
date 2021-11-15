<?php
    if ($_SESSION['nivel'] < 2){
        session_destroy();
        header('location: ../index.php');
    } 
?>