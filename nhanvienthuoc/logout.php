<?php
session_start();
session_destroy();  
header("Location: ../nhanvien/login.php");
?>