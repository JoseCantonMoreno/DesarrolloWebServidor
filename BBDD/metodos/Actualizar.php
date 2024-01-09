<?php
include_once("metodos.php");
Metodo::Actualiza($_POST["id"],$_POST["Jugador"], $_POST["Equipo"], $_POST["Edad"]);
header("location:../PHP/Modificar.php");
?>