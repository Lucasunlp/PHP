<?php
	require("managerBD.php");
	$consulta= "SELECT * FROM etiqueta";      
	$ejecutarConsulta= mysql_query($consulta) or die (mysql_error()); 

 ?>
<!DOCTYPE html>
<html>
	<head>
        <title> LISTA DE LIBROS </title> 

        <script>
        function chequeo(id) {
            var respuesta = confirm("\u00BFEsta seguro de borrar este item?");

            if (respuesta){

                document.location = id;

            }
        }
        </script>

        <script>
        function chequeoRestaurar(id) {
            var respuesta = confirm("\u00BFEsta seguro de restaurar este item?");

            if (respuesta){

                document.location = id;

            }
        }
        </script>

    </head>
    <body>
        <table class="table table-striped">
        <thead>
            <tr> <th>Etiqueta</th> <th>Borrada</th> <th colspan="3">HERRAMIENTAS </th> </tr>
        </thead>
        <tbody>
            <?php
                while ($row=mysql_fetch_array($ejecutarConsulta)) :
                    ?>
                    <tr>
                    <td> <?php echo $row['nombreE'];?> </td>
                    <?php 
                    if ($row['borrado']){
                    ?>
                        <td>SI</td>
                        <td><a href="javascript:chequeoRestaurar('restaurarEtiqueta.php?nombreE=<?php echo $row['nombreE'];?>')"> <button type="button" class="btn btn-primary btn-xs"> Restaurar </button> </a> 
                        <button type="button" class="btn btn-primary btn-xs" disabled="disabled"> Borrar </button> 
                    <?php
                    }else{
                    ?>
                        <td>NO</td>
                        <td><button type="button" class="btn btn-primary btn-xs" disabled="disabled"> Restaurar </button> </a>
                        <a href="javascript:chequeo('borrarEtiqueta.php?nombreE=<?php echo $row['nombreE'];?>')"> <button type="button" class="btn btn-primary btn-xs"> Borrar </button> </a>
                    <?php
                    }
                    ?>
                    <a href="modificarEtiqueta.php?nombreE=<?php echo $row['nombreE'];?>"> <button type="button" class="btn btn-primary btn-xs"> Modificar </button> </a>
                    </td>
                    
                    <?php 
                endwhile;
            ?>
        </tbody>
        </table>
    </body>
</html>