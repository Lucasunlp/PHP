<?php
    require("managerBD.php");
    $nombreE=mysql_real_escape_string($_GET['nombreE']);
    $consulta="SELECT * FROM libro_has_etiqueta WHERE libro_has_etiqueta.etiqueta_nombre='$nombreE'";
    $ejecutarConsulta= mysql_query($consulta) or die (mysql_error());
    if (mysql_num_rows($ejecutarConsulta) > 0) { // Verifico si corresponde hacer borrado Lógico.
        $consulta= "UPDATE etiqueta SET borrado=1 WHERE nombreE='$nombreE'";
        $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
        echo "Se elimino exitosamente la etiqueta ". $nombreE;
        header("refresh:4;url=adminetiqueta.php");
    }   
    else{ //Hago borrado Físico.
        $consulta="DELETE FROM etiqueta WHERE nombreE='$nombreE'";
        $ejecutarConsulta= mysql_query($consulta) or die(mysql_error());
        if (mysql_affected_rows() >0){
            echo "Se elimino exitosamente la etiqueta ". $nombreE;
            header("refresh:4;url=adminetiqueta.php");
        }
        else{
            echo "Ocurrio un error al intentar eliminar los datos";
            header("refresh:4;url=adminetiqueta.php");
        }
    }
    include("cerrarConexion.php");
?>