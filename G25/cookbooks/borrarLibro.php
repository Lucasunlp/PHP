<?php
    require("managerBD.php");
    $isbn=mysql_real_escape_string($_GET['isbn']);
    $consulta="SELECT * FROM compra_has_libro WHERE compra_has_libro.libro_isbn='$isbn'";
    $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
    if (mysql_num_rows($ejecutarConsulta) > 0) {  // SI el libro a borrar figura en alguna compra, hago borrado lógico.
        $consulta="UPDATE libro SET borrado=1 WHERE isbn='$isbn'";
        $ejecutarConsulta= mysql_query($consulta) or die(mysql_error());
        echo "Se elimino exitosamente el libro ". $isbn; //LOGICAMENTE
        header("refresh:4;url=adminlibro.php");
    }
    else{ // Hago borrado físico.

        $consulta="DELETE FROM libro_has_autor WHERE libro_has_autor.libro_isbn='$isbn'";
        $ejecutarConsulta= mysql_query($consulta) or die(mysql_error());
        if (mysql_affected_rows() >0){
            $consulta="DELETE FROM libro_has_etiqueta WHERE libro_has_etiqueta.libro_isbn='$isbn'";
            $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
            $consulta="DELETE FROM libro WHERE isbn='$isbn'";
            $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
            echo "Se elimino exitosamente el libro ". $isbn;
            header("refresh:4;url=adminlibro.php");
            
        }
        else{
                echo "Ocurrio un error al intentar eliminar los datos";
                header("refresh:4;url=adminlibro.php");
        }
    }
    include("cerrarConexion.php");
?>