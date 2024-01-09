<?php
include_once("metodos.php");
Metodo::MeterJugador($_POST["Jugador"], $_POST["Equipo"], $_POST["Edad"]);
header("location:../PHP/loginCrud.php");
?>