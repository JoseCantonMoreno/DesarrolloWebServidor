<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #565656;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 1);
      width: 300px;
    }
    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input, select {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .botones {
      display: flex;
      gap: 10px; 
    }
    input[type="button"] {
      background-color: #4caf50;
      width: 50%;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="button"]:hover {
      background-color: #45a049;
    }
    button {
      width: 50%;
      background-color: #4caf50;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      height: 35.5px;
    }

    button:hover {
      background-color: #45a049;
    }
    h1 {
      text-align: center;
    }
</style>

</head>

<body>
    <?php
    session_start();
    include_once("../metodos/metodos.php");

    if (isset($_SESSION["usuarios"]) || isset($_POST["usuarios"], $_POST["contraseñas"]) && Metodo::Inicio($_POST["usuarios"], $_POST["contraseñas"])) {

        isset($_POST["usuarios"], $_POST["contraseñas"]);
            $_SESSION["usuarios"] = $_POST["usuarios"];
            header("location:loginCrud.php");
    }else{
    ?>
     <form action="loginCrud.php" method="post">
    <h1>Iniciar Sesión</h1>
        <label>Nombre:</label>
        <input type="text" name="usuarios" placeholder="Nombre Usuario">
        <label>Contraseña:</label>
        <input type="password" name="contraseñas" placeholder="Contraseña">
        <div class="botones">
        <button type="submit">Iniciar Sesion</button>
        </div>
    </form>

    <?php
    }
    ?>

</body>

</html>