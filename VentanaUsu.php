<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("https://fondosmil.com/fondo/12440.jpg");
        }
        p {
            color: white;
        }
        .login {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 400px;
        padding: 40px;
        transform: translate(-50%, -50%);
        background: rgba(0,0,0,.5);
        box-sizing: border-box;
        box-shadow: 0 15px 25px rgba(0,0,0,.6);
        border-radius: 10px;
        border: 2px solid black;
        }
        label {
            color: white;
            font-size: 25px;
            text-shadow: 0 0 5px white;
        }
        p {
            height: 50px;
            background-color: black;
            border-radius: 10px;
            border: 2px solid black;
            box-shadow: 0 15px 25px rgba(0,0,0,.6); 
        }
    </style>
</head>
<body>
    <div class="login">
    <form method="post">
        <label>Ruta Actual:</label>
        <p><?php
            session_start();
            if (isset($_POST['nombre'])) {
                $_SESSION['usuario'] = $_POST['nombre'];
            }
                if (isset($_POST['boton'])) {
                    $ruta_actual = getcwd();
                    echo "La ruta actual es: $ruta_actual";
                }
            
            ?></p>
        <input type="submit" name="boton" value="Conoce la Ruta Actual">
    </form>
    <form method="post">
        <label>Buscar Archivo:</label>
        <input type="text" name="archivo" placeholder="Ruta Del Archivo">
        <p>
            <?php
            if (isset($_POST['boton2'])) {
            if (isset($_POST['archivo'])) {
                $archivo = scandir(getcwd());
                if (in_array($_POST['archivo'], $archivo)) {
                    echo "Archivo encontrado";
                } else {
                    echo "El archivo no existe";
                }
            }
        }
            ?>
        </p>
        <input type="submit" name="boton2" value="Buscar Archivo">
    </form>
    </div>
</body>
</html>
