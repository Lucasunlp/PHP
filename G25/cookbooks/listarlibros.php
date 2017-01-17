<?php
	require("managerBD.php");
	
	$consulta= "SELECT * FROM libro INNER JOIN libro_has_autor ON libro.isbn=libro_has_autor.libro_isbn INNER JOIN autor on libro_has_autor.autor_autor_id=autor.autor_id";
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
			<tr> <th>Libro</th> <th>Autor</th> <th>ISBN</th> <th>Etiquetas</th> <th>Precio</th> <th>Editorial</th> <th>Fecha de Publicacion</th> <th>Idioma</th> <th>Nro de Paginas</th> <th>Borrado</th> <th colspan="2">HERRAMIENTAS </th> </tr>
		</thead>
		<!-- Usando mysql_fetch_array() para obtener la siguiente fila hasta la ultima de la tabla -->
		<tbody>
			<?php
				while ($row = mysql_fetch_array($ejecutarConsulta)) :
				?>
 				<tr>
 				<td><?php echo $row['nombreL'];?> </td>
 				<td><?php echo $row['nombreA']?> </td>
 				<td><?php echo $row['isbn']?> </td>
 				<td>
 				<?php
 					$isbn=mysql_real_escape_string($row['isbn']);
 					$consulta2="SELECT etiqueta_nombre FROM libro_has_etiqueta WHERE libro_has_etiqueta.libro_isbn='$isbn'";
 					$match=mysql_query($consulta2) or die(mysql_error());
 					if (mysql_num_rows($match) > 0){
 							while ($eti= mysql_fetch_array($match)) {
    							echo $eti['etiqueta_nombre'], '<br>';
							}
	 				}
	 				else{
	 					echo "---";
	 				}
	 			?>
 				</td>
 				<td><?php echo $row['precio']?> </td>
 				<td><?php echo $row['editorial']?> </td>
 				<td><?php echo $row['fecha_pub']?> </td>
 				<td><?php echo $row['idioma']?> </td>
 				<td><?php echo $row['cantPaginas']?> </td>
 				<?php 
 				if ($row['borrado']){
 					?>
 					<td> SI </td>
 					<td>
						<button type="button" class="btn btn-primary btn-xs" disabled="disabled"> Borrar </button> 
						<a href="javascript:chequeoRestaurar('restaurarLibro.php?isbn=<?php echo $row['isbn'];?>')"> <button type="button" class="btn btn-primary btn-xs"> Restaurar </button> </a>
 				<?php 
 				}else{
 					?>
 					<td> NO </td>
 					<td>
	 					<a href="javascript:chequeo('borrarLibro.php?isbn=<?php echo $row['isbn'];?>')"> <button type="button" class="btn btn-primary btn-xs"> Borrar </button> </a>
	                    <button type="button" class="btn btn-primary btn-xs" disabled="disabled"> Restaurar </button> 

 				<?php
 				}
 				?>
 				<a href="modificarLibro.php?isbn=<?php echo $row['isbn'];?>"> <button type="button" class="btn btn-primary btn-xs"> Modificar </button> </a> 			
	            </td>
	            <?php 
				endwhile;
			?>
		</tbody>
		</table>

	</body>
</html>