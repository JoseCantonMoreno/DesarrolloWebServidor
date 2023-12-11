<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    <!-- <script>
        "use strict";
console.clear();

var root = document.querySelector(":root");
function pointer(e) {
root.style.setProperty("--y", e.pageY + "px");
}
window.addEventListener("pointermove", pointer);
window.addEventListener("pointerdown", pointer);
    </script>  -->
</head> 
<body>
<!-- <div id="bg"></div>
<div id="bg_mask"></div>  -->
<div class="login">
<h2>Login</h2>
<form method="post">
    <div class="caja">
        <input type="text" name="nombre" required>
        <label>Nombre y Apellidos</label>
    </div>
    <div class="caja">
        <input type="password" name="contraseña" required>
        <label>Contraseña</label>
    </div>
    <div class="log">
    <?php 
    
    include("login.php");
    
    ?>
    </div>
    <a href="#">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <button type="submit">Iniciar Sesion</button>
    </a>
</form>
</div>   
    
</body>
</html>