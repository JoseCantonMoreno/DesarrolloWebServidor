<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body class=" align-items-center d-flex bg-grey">

<?php
    session_start();
    include_once("../metodos/metodos.php");
    if (isset($_SESSION["Usuario"])) {
            header("location:login.php");
    }else{
?>


        <div class="container ">

            <div class="row formulario">
                <div class="">
                    <form action="../metodos/añadir.php" method="post">
                        <input type="text" name="Nombre" placeholder="Nombre" required>
                        <input type="text" name="Puesto" placeholder="Puesto" required>
                        <br>
                        <br>
                        <input class="btn btn-dark btn-black " type="submit" value="Crear">
                    </form>
                    </form>
                    <form action="../metodos/salir.php"><button class="btn btn-dark btn-outline-green d-flex botonC">Cerrar Sesion</button></form>
        </div>            
        <div class="container  mt-5">
                </div>
                <div class="col-2"></div>
                <div class="">
                    <div>
                        <table class="table table-hover table-light  ">
                            <tr class="">
                                <th>ID</th>
                                <th>Jugador</th>
                                <th>Equipo</th>
                                <th>Edad</th>
                                <th></th>
                                </tr>

                                <?php


                                Metodo::MostrarTabla();

                                ?>
                            

                        </table>
                    </div>
                </div>

            </div>


        </div>
        <?php
    }
        ?>
</body>
</html>