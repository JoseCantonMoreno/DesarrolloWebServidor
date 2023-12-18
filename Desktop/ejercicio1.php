<?php

if (isset($_POST['precio'])) {
    $precioCesta = $_POST['precio'];

    if ($precioCesta <= 50) {
        $costes += 3,95;
    } elseif ($precioCesta >= 50 && $precioCesta <= 75) {
        $costes += 2,95;
    } elseif ($precioCesta >= 75 && $precioCesta <= 100) {
        $costes += 1,95;
    } else {
        echo "Envio Gratis";
    }
    echo "El precio total de la cesta es: ". $precioCesta + $costes."€";
}
    if (isset($_POST['precio'])) {
        $precioTotal = floatval($_POST["precioTotal"]);

        $gastosEnvio = 0;
        switch (true) {
            case ($precioTotal < 50):
                $gastosEnvio = 3.95;
                break;
            case ($precioTotal >= 50 && $precioTotal < 75):
                $gastosEnvio = 2.95;
                break;
            case ($precioTotal >= 75 && $precioTotal < 100):
                $gastosEnvio = 1.95;
                break;
            default:
                $gastosEnvio = 0;
                break;
        }
        echo "<p>Los gastos de envío son: " . number_format($gastosEnvio, 2) . "€</p>";
    }
    if (isset($_POST['precio'])) {
        $numeroMayor = PHP_INT_MIN; 
        for ($i = 1; $i <= 5; $i++) {
            $inputName = "numero" . $i;
            $numero = floatval($_POST[$inputName]);

            if ($numero > $numeroMayor) {
                $numeroMayor = $numero;
            }
        }
        echo "<p>El número mayor de los ingresados es: " . $numeroMayor . "</p>";
    }
    if (isset($_POST['precio'])) {
    $matriz = array(
        array(3, 1),
        array(2, 0)
    );
    foreach ($matriz as $fila) {
        foreach ($fila as $valor) {
            echo $valor . " ";
        }
        echo "<br>";
    }
}
if (isset($_POST['precio'])) {
    $matriz1 = array(
        array(1, 0),
        array(0, 1)
    );
    $matriz2 = array(
        array(0, 1),
        array(1, 0)
    );
    $resultado = array();
    for ($i = 0; $i < count($matriz1); $i++) {
        for ($j = 0; $j < count($matriz1[$i]); $j++) {
            $resultado[$i][$j] = $matriz1[$i][$j] + $matriz2[$i][$j];
        }
    }
    echo "Resultado de la suma de las matrices:<br>";
    for ($i = 0; $i < count($resultado); $i++) {
        for ($j = 0; $j < count($resultado[$i]); $j++) {
            echo $resultado[$i][$j] . " ";
        }
        echo "<br>";
    }
}
?>