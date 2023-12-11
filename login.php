<?php
    session_start();
    
if (isset($_POST['nombre']) && isset($_POST['contraseña'])) {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
}
    if (!empty($_POST['nombre']) && !empty($_POST['contraseña'])) {
    if ($_POST['nombre'] == "admin" && $_POST['contraseña'] == "1234") {
        $_SESSION["usuario"] = $_POST['nombre'];
        header("Location: VentanaAd.php");
    } else if ($_POST['nombre'] == "cliente1" && $_POST['contraseña'] == "1234") {
        $_SESSION["usuario"] = $_POST['nombre'];
        header("Location: VentanaUsu.php");
    } else {
        echo "Lo siento ese usuario no existe";
    }
    } else {
        echo "Completa los campos";
    }
?>