<?php
class Metodo
{
    public static function crearTabla()
    {
        $host = "localhost";
        $usuario = "root";
        $contraseña = "";
        $conexion = mysqli_connect($host, $usuario, $contraseña);



        $sql = "CREATE DATABASE IF NOT EXISTS Practica_Tema9";

        $crearTabla = "CREATE TABLE IF NOT EXISTS Registro_Empleados( ID INT, DNI INT(9) AUTO_INCREMENT PRIMARY KEY, Nombre VARCHAR(40), Contraseña VARCHAR(40), Puesto VARCHAR(50));";

        $tablaJugadores = "CREATE TABLE IF NOT EXISTS Cosas_Empleados( ID INT, Nombre VARCHAR(40), Puesto VARCHAR(50));";

        mysqli_query($conexion, $sql);

        mysqli_select_db($conexion, "Practica_Tema9");

        mysqli_query($conexion, $crearTabla);

        mysqli_query($conexion, $tablaJugadores);

        mysqli_close($conexion);
    }



    public static function Crear($dni, $user, $contraseñas, $puesto)
    {

        $host = "localhost";
        $usuario = "root";
        $contraseña = "";
        $baseDatos = "Practica_Tema9";

        $conexion = mysqli_connect($host, $usuario, $contraseña, $baseDatos);

        $ConsultaInsertar = "INSERT INTO Registro_Empleados VALUES(?,?,?,?)";

        $stmtInsertar = mysqli_prepare($conexion, $ConsultaInsertar);

        mysqli_stmt_bind_param($stmtInsertar, "isss",$dni, $user, $contraseñas, $puesto);

        mysqli_stmt_execute($stmtInsertar);

        mysqli_stmt_close($stmtInsertar);
        mysqli_close($conexion);
    }


    public static function RegistroExistente($user)
    {

        $host = "localhost";
        $usuario = "root";
        $contraseña = "";
        $baseDatos = "Practica_Tema9";
        $conexion = mysqli_connect($host, $usuario, $contraseña, $baseDatos);
        $Existe = false;


        $consultaUsuarios = "SELECT * FROM Registro_Empleados WHERE Nombre=?";
        $stmtUsuario = mysqli_prepare($conexion, $consultaUsuarios);
        mysqli_stmt_bind_param($stmtUsuario, "s", $user);
        mysqli_stmt_execute($stmtUsuario);

        mysqli_stmt_store_result($stmtUsuario);

        if (mysqli_stmt_num_rows($stmtUsuario) > 0) {
            $Existe = true;
        }
        mysqli_stmt_close($stmtUsuario);



        mysqli_close($conexion);

        return $Existe;
    }




    public static function Inicio($user, $contraseñas){

        $host = "localhost";
        $usuario = "root";
        $contraseña = "";
        $baseDatos = "Practica_Tema9";

        $conexion = mysqli_connect($host, $usuario, $contraseña, $baseDatos);
        $Existe = false;

        $consulta = "SELECT Contraseña FROM Registro_Empleados WHERE Nombre=?";//Creo Consulta
        $stmt = mysqli_prepare($conexion, $consulta);//Preparo Consulta

        mysqli_stmt_bind_param($stmt, "s", $user);//Vinculo los parámetros

        //Ejecuto la consulta
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $claveColumna);


        
        mysqli_stmt_fetch($stmt);// Obtener resultados
        
        if ($contraseñas == $claveColumna) {//Verifica que la clave introducida sea la misma que la de la columna
            $Existe = true;
        }

        // Cierro conexiones
        mysqli_stmt_close($stmt);
        mysqli_close($conexion);

        return $Existe;
    }
    

    public static function MeterJugador($nombre, $puesto)
    {
        $host = "localhost";
        $usuario = "root";
        $contraseña = "";
        $baseDatos = "Practica_Tema9";
        $conexion = mysqli_connect($host, $usuario, $contraseña, $baseDatos);


        $ConsultaInsertar = "INSERT INTO Registro_Empleados (Nombre,Puesto) VALUES(?,?)";//Consultar los valores

        $stmtInsertar = mysqli_prepare($conexion, $ConsultaInsertar);//Preparo la consulta de insertar

        mysqli_stmt_bind_param($stmtInsertar, "ss", $nombre, $puesto);//Vincular parametros

        mysqli_stmt_execute($stmtInsertar);//Ejecuta la consulta preparada

        //Cerrar conexiones
        mysqli_stmt_close($stmtInsertar);
        mysqli_close($conexion);
    }











    public static function EliminarJugador($id)
    {
        $host = "localhost";
        $usuario = "root";
        $contraseña = "";
        $baseDatos = "Practica_Tema9";

        $conexion = mysqli_connect($host, $usuario, $contraseña, $baseDatos);//Establezco conexion
        $consultaEliminar = "DELETE FROM Registro_Empleados WHERE ID=$id";//Consulta para eliminar
        $stmt = mysqli_prepare($conexion, $consultaEliminar);//Preparo consulta

        //Ejecutar y sacar respuesta de la consulta
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        //Cerrar conexiones
        mysqli_stmt_close($stmt);
        mysqli_close($conexion);
    }








    public static function MostrarTabla()
    {
        $host = "localhost";
        $usuario = "root";
        $contraseña = "";
        $baseDatos = "Practica_Tema9";

        $conexion = mysqli_connect($host, $usuario, $contraseña, $baseDatos);//Iniciar conexion
        $consultaJugadores = "SELECT * FROM Cosas_Empleados";//Creo consulta 

        $Stmt = mysqli_prepare($conexion, $consultaJugadores);//preparo consulta
        //ejecuto consulta
        mysqli_stmt_execute($Stmt);
        mysqli_stmt_store_result($Stmt);
        mysqli_stmt_bind_result($Stmt, $id, $Nombre, $contraseña);

        while (mysqli_stmt_fetch($Stmt)) {

            echo "<tr'>";
            echo "<td style='color:grey;'>$id</td>";
            echo "<td>$Nombre</td>";
            echo "<td>$contraseña</td>";
            echo "<td><form method='post' action='../metodos/Borrar.php'> <button name='id' value='$id' class='btn-yellow '>
            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
  <path stroke-linecap='round' stroke-linejoin='round' d='M12 4.5v15m7.5-7.5h-15' />
</svg></button></form></td>";
            echo "<td><form method='post' action='../PHP/Modificar.php'> <button name='id' value='$id' class='btn-yellow '>
          </button></form></td>";
            echo "</tr>";
        }

        //Cierro Conexion
        mysqli_stmt_close($Stmt);
        mysqli_close($conexion);
    }

    public static function Actualiza($id, $Nombre, $contraseña)
    {

        $host = "localhost";
        $usuario = "root";
        $contraseña = "";
        $baseDatos = "Practica_Tema9";
        $conexion = mysqli_connect($host, $usuario, $contraseña, $baseDatos);//Creo la conexion
        $update = "UPDATE Cosas_Empleados SET Nombre=?, contraseña=? WHERE ID=?";//Creo la consulta de actualizar la tabla
        $stmt = mysqli_prepare($conexion, $update);//Preparo consulta
        mysqli_stmt_bind_param($stmt, "iss",$id, $Nombre, $contraseña);//Vinculo los parametros
        mysqli_stmt_execute($stmt);//Ejecuto parametros

        //Cierro conexiones
        mysqli_stmt_close($stmt);
        mysqli_close($conexion);
    }
}
