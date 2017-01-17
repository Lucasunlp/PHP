<?php
    if ($_POST["nombre_libro"] && $_POST["idA"] && $_POST["precio"] && $_POST["idioma"] && $_POST["editorial"] && $_POST["cantPaginas"] && $_POST["isbn"] && $_POST["fecha_pub"]){
        require("managerBD.php");
        $nombreL= mysql_real_escape_string($_POST["nombre_libro"]);
        $idA= mysql_real_escape_string($_POST["idA"]);  
        $precio= mysql_real_escape_string($_POST["precio"]);
        $idioma= mysql_real_escape_string($_POST["idioma"]);
        $editorial= mysql_real_escape_string($_POST["editorial"]);
        $cantPaginas= mysql_real_escape_string($_POST["cantPaginas"]);
        $isbn= mysql_real_escape_string($_POST["isbn"]);
        $fecha_pub= mysql_real_escape_string($_POST["fecha_pub"]);
        $isbn_viejo=mysql_real_escape_string($_POST['isbn_viejo']);
        
        //echo "pre update libro_has_autor".'<BR/>';
        //$consulta="DELETE FROM libro_has_autor WHERE libro_isbn='$isbn_viejo'";
        //$ejecutarConsulta=mysql_query($consulta) or die(mysql_error());

        //echo "post delete from libro_has_autor".'<BR/>';

        //$consulta="INSERT INTO libro_has_autor (libro_isbn, autor_autor_id) VALUES ('$isbn', '$idA')";
        //$ejecutarConsulta=mysql_query($consulta) or die(mysql_error());

        $consulta="UPDATE libro_has_autor SET autor_autor_id='$idA' WHERE libro_isbn='$isbn_viejo'";
        $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
        //echo "post insert into".'<BR/>';
        //echo "post update libro_has_autor".'<BR/>';

        //if (mysql_affected_rows() >0){ //SI borro e inserto exitosamente en libro_has_autor
            //echo "pre delete libro_has_etiqueta".'<BR/>';
            //$consulta="DELETE FROM libro_has_etiqueta WHERE libro_isbn='$isbn_viejo'";
            //$ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
            //echo "pre foreach libro_has_etiqueta".'<BR/>';
            
            if (isset($_POST['etiquetas'])) {
                //echo "post isset".'<BR/>';
                foreach ($_POST['etiquetas'] as $eti) {
                    //echo "post foreach".'<BR/>';
                    $realEti=mysql_real_escape_string($eti);
                    //$consulta="INSERT INTO libro_has_etiqueta (libro_isbn, etiqueta_nombre) VALUES ('$isbn', '$realEti')";

                    $consulta="SELECT * FROM libro_has_etiqueta WHERE libro_isbn='$isbn_viejo'";
                    $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
                    
                    if (mysql_num_rows($ejecutarConsulta) >0){ //Hay etiquetas con isbn_viejo, updateo:

                        //echo "if numrows>0";

                        $consulta="UPDATE libro_has_etiqueta SET etiqueta_nombre='$realEti' , libro_isbn='$isbn' WHERE libro_isbn='$isbn_viejo'";
                        $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
                    }
                    else{
                        //echo "else numrows>0";
                        $consulta="INSERT INTO libro_has_etiqueta (libro_isbn, etiqueta_nombre) VALUES ('$isbn', '$realEti')";
                        $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
                        //echo "Inserto en libro_has_etiqueta".'<BR/>';

                    }
                    

                }
            }
            $consulta="UPDATE libro SET nombreL='$nombreL' , precio='$precio' , idioma='$idioma' , editorial='$editorial' , cantPaginas='$cantPaginas' , isbn='$isbn' , fecha_pub='$fecha_pub' WHERE isbn='$isbn_viejo'";
            $ejecutarConsulta=mysql_query($consulta) or die(mysql_error());
            echo "Actualizacion exitosa";
            header("refresh:3;url=adminlibro.php");

        //}
        //else{
        //    echo "Hubo un error al actualizar el autor";
           //header("refresh:3;url=adminlibro.php");
        //}
    }
    include("cerrarConexion.php");
?>