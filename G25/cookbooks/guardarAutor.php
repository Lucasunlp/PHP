<?php
    if ($_POST["autor"] && $_POST["nacionalidad"]){
        require("managerBD.php");    
        $autor=mysql_real_escape_string($_POST["autor"]);
        $nacionalidad=mysql_real_escape_string($_POST["nacionalidad"]);
        $consulta="SELECT * FROM autor where nombreA='$autor' AND nacionalidad='$nacionalidad'";
        $ejecutarConsulta=mysql_query($consulta);
        echo mysql_error();
        if (mysql_num_rows ($ejecutarConsulta) == 0){
            $consulta= "INSERT INTO autor (nombreA, nacionalidad) VALUES ('$autor', '$nacionalidad')";
            $ejecutarConsulta=mysql_query($consulta);
            echo mysql_error();
            if (mysql_affected_rows()>0){
                echo "Se realizo correctamente el alta.";
                header("refresh:4;url=altaAutor.php");
            }else{
                echo $ejecutarConsulta;
                echo "Ocurrio un error al guardar los datos";
                header("refresh:6;url=altaAutor.php");
            }
        }else{
        echo "Ocurrio un error al guardar los datos: Autor ya existente en el sistema";
        header("refresh:6;url=altaAutor.php");
        }
    }

    include("cerrarConexion.php");
?>