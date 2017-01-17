<?php
    require("managerBD.php");  
    $etiqueta=mysql_real_escape_string($_POST["etiqueta"]);
    $consulta= "SELECT nombreE FROM etiqueta WHERE nombreE='$etiqueta'";
    $resultado= mysql_query($consulta) or die (mysql_error());
    if (mysql_num_rows ($resultado) == 0){
            $consulta= "INSERT INTO etiqueta (nombreE) VALUES ('$etiqueta')";
            $ejecutarConsulta=mysql_query($consulta);
            echo mysql_error();
            if (mysql_affected_rows()>0){
                echo "Se realizo correctamente el alta.";
                header("refresh:4;url=altaEtiqueta.php");
            }else{
                echo $ejecutarConsulta;
                echo "Ocurrio un error al guardar los datos";
                header("refresh:6;url=altaEtiqueta.php");
            }
    }else{
        echo "Ocurrio un error al guardar los datos: Etiqueta ya existente en el Sistema";
        header("refresh:6;url=altaEtiqueta.php");
    }
    include("cerrarConexion.php");
?>