<?php
    require("managerBD.php");
    $idA=mysql_real_escape_string($_GET['autor_id']);
    $consulta="SELECT * FROM libro_has_autor WHERE autor_autor_id='$idA'";
    $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
    
    if(mysql_num_rows($ejecutarConsulta) >0){ //SI tengo q borrar logicamente 
        $consulta="UPDATE autor SET borrado=1 WHERE autor_id='$idA'";
        $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
        if (mysql_affected_rows() >0){
            echo "Se elimino exitosamente el autor.";
            header("refresh:3;url=adminautor.php");
        }
        else{
            echo "Ocurrio un error al intentar eliminar los datos";
            header("refresh:3;url=adminautor.php");
        }
    }
    else{ //borro fisicamente
        $consulta="DELETE FROM autor WHERE autor_id='$idA'";
        $ejecutarConsulta= mysql_query($consulta) or die(mysql_error());
        if (mysql_affected_rows() >0){
            echo "Se elimino exitosamente el autor.";
            header("refresh:3;url=adminautor.php");
        }
        else{
            echo "Ocurrio un error al intentar eliminar los datos";
            header("refresh:3;url=adminautor.php");
        }
    
    }
    include("cerrarConexion.php");
?>