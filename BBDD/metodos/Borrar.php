<?php
include_once("metodos.php");
Metodo::EliminarJugador($_POST["id"]);
header("location:../PHP/loginCrud.php");
?>