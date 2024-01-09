<?php 
session_start();
session_destroy();
header("location:../PHP/login.php");
?>