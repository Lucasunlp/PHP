<?php
	require("managerBD.php");
	
	$consulta= "SELECT * FROM libro INNER JOIN libro_has_autor ON libro.isbn=libro_has_autor.libro_isbn INNER JOIN autor on libro_has_autor.autor_autor_id=autor.autor_id"; //INNER JOIN libro_has_etiqueta on libro.isbn=libro_has_etiqueta.libro_isbn";      
	$ejecutarConsulta= mysql_query($consulta) or die (mysql_error()); 
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title> LISTA DE LIBROS </title>

	</head>
	<body>
		<table class= "table table-striped">
		<thead>
			<tr> <th>Libro</th> <th>Autor</th> <th>ISBN</th> <th>Etiquetas</th> <th>Precio</th> <th>Editorial</th> <th>Fecha de Publicacion</th> <th>Idioma</th> <th>Nro de Paginas</th> <th>Descripcion</th></tr>
		</thead>
		<!-- Usando mysql_fetch_array() para obtener la siguiente fila hasta la ultima de la tabla -->
		<tbody>
			<?php
				while ($row = mysql_fetch_array($ejecutarConsulta)) :
 				?>
 				<tr>
 				<td><?php echo $row['nombreL'];?></td>
 				<td><?php echo $row['nombreA'];?></td>
 				<td><?php echo $row['isbn'];?></td>
 				<td>
 				<?php
 					$isbn=mysql_real_escape_string($row['isbn']);
 					$consulta2="SELECT etiqueta_nombre FROM libro_has_etiqueta WHERE libro_has_etiqueta.libro_isbn='$isbn'";
 					$match=mysql_query($consulta2) or die(mysql_error());

 					if (mysql_num_rows($match) > 0){ //Si tiene etiquetas
 						
 							while ($eti= mysql_fetch_array($match)) { // recorro imprimiendo cada etiqueta

 								$consulta= "SELECT * from etiqueta WHERE nombreE='$eti[etiqueta_nombre]' AND borrado=1";
 								$re=mysql_query($consulta) or die(mysql_error());

 								if (mysql_num_rows($re) <1) { // La etiqueta no está borrada, la muestro.
    								echo $eti['etiqueta_nombre'], '<br>';
    							}
    							else{
    							}

							}
	 				}
	 			?>
 				</td>
 				<td><?php echo$row['precio'];?></td>
 				<td><?php echo $row['editorial'];?></td>
 				<td><?php echo $row['fecha_pub'];?></td>
 				<td><?php echo $row['idioma'];?></td>
 				<td><?php echo $row['cantPaginas'];?></td>
 				<td> <a href="detalles.php?isbn=<?php echo $row['isbn'];?>"> <button type="button" class="btn btn-primary btn-xs" > <p style= "font-size:12px; font-weight:Bold;"> Ver Detalles </p></button></a></td>
 				 				
				<?php endwhile;
			?>
		</tbody>
		</table>
	</body>
</html>