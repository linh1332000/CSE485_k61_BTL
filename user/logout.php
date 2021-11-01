<?php
    session_start(); //Dịch vụ bảo vệ
    
    session_destroy();
    header("Location: ../index.php");
    
?>
