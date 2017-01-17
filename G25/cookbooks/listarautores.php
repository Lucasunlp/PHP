<?php
 require("managerBD.php");
	
	$consulta= "SELECT * FROM autor ";      
	$ejecutarConsulta= mysql_query($consulta) or die (mysql_error()); 
 ?>

<html>
	<head>
		<title> LISTA DE AUTORES </title>

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
		<Table class="table table-striped">
		<thead>
			<tr> <th>Autor_ID</th> <th>Nombre</th> <th>Nacionalidad</th> <th>borrado</th> <th colspan="2">HERRAMIENTAS </th> </tr>
		</thead>
		<!-- Using mysql_fetch_array() to get the next row until end of table rows -->
		<tbody>
			<?php
				while ($row = mysql_fetch_array($ejecutarConsulta)) :
					?>
        			<tr>
        			<td><?php echo $row['autor_id']?> </td>
                    <td><?php echo $row['nombreA']?> </td>
        			<td><?php echo $row['nacionalidad']?> </td>
        			<?php 
                    if ($row['borrado']){ 
                    	?>
                    	<td> SI </td>
                        <td><a href="javascript:chequeoRestaurar('restaurarAutor.php?autor_id=<?php echo $row['autor_id'];?>')"> <button type="button" class="btn btn-primary btn-xs"> Restaurar </button> </a>
                    <?php 
                    }else{
                    	?>
                    	<td> NO </td>
                        <td><button type="button" class="btn btn-primary btn-xs" disabled="disabled"> Restaurar </button> </a>
                    <?php 
                	}
                    $idA= mysql_real_escape_string($row['autor_id']);
                    $consulta="SELECT * FROM libro_has_autor WHERE libro_has_autor.autor_autor_id='$idA'";
                    $match= mysql_query($consulta) or die (mysql_error());
                    if (mysql_num_rows($match) >0){
                        ?>
                        <button type="button" class="btn btn-primary btn-xs" disabled="disabled"> borrar </button>
                        <?php
                    }
                    else{
                        ?>
                        <a href="javascript:chequeo('borrarAutor.php?autor_id=<?php echo $row['autor_id'];?>')"> <button type="button" class="btn btn-primary btn-xs"> borrar </button> </a>
                        
                        <?php
                    }
                    ?>        
                    <a href="modificarAutor.php?autor_id=<?php echo $row['autor_id'];?>"> <button type="button" class="btn btn-primary btn-xs"> modificar </button> </a>
                    </td>    
                    <?php     
 				endwhile;
			?>
        </tbody>
		</body>
		</table>

	</body>
</html>