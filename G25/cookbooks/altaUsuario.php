<?php
    if ($_POST["nombre"] && $_POST["apellido"] && $_POST["nombreU"]  && $_POST["direccion"] && $_POST["clave"]){
        require("managerBD.php");    
        $nombre=mysql_real_escape_string($_POST["nombre"]);
        $apellido=mysql_real_escape_string($_POST["apellido"]);
        $nombreU=mysql_real_escape_string($_POST["nombreU"]);
        $clave=mysql_real_escape_string($_POST["clave"]);
        $domicilio=mysql_real_escape_string($_POST["direccion"]);
        $consulta="INSERT INTO usuario (nombre, apellido, nombreU, clave, domicilio) VALUES ('$nombre', '$apellido','$nombreU','$clave','$domicilio')";
        $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
        if (mysql_affected_rows()>0){
            echo "ok";
            if ($_POST["email"]){
                $email=mysql_real_escape_string($_POST["email"]);
                $consulta= "UPDATE usuario SET email='$email' WHERE nombreU='$nombreU'";
                $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
            }
            if ($_POST["telefono"]){
                $telefono=mysql_real_escape_string($_POST["telefono"]);
                $consulta= "UPDATE usuario SET tel='$telefono' WHERE nombreU='$nombreU'";
                $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
            }
            echo "Registrado exitosamente!";
            header("refresh:3;url=home.php");

        }else{
            echo $ejecutarConsulta;
            echo "Ocurrio un error al guardar los datos. Datos proporcionados invalidos";
            header("refresh:3;url=registrarse.php");
        }
    }
    include("cerrarConexion.php");
?>