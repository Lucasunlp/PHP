<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
	<header>
		<h1>Detalles</h1>
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	<section>
		
	<?php
		include 'conexion.php';
		$re=mysql_query("select * from carrito where id=".$_GET['id']) or die(mysql_error());
		while ($f=mysql_fetch_array($re)) {
		?>


			<div class="imagenes">
			<center>
				<img src="./imagenes/<?php echo $f['imagen'];?>"><br>
				<span><?php echo $f['nombre'];?></span><br>
				<span>Precio: <?php echo $f['precio'];?></span><br>
				<span>Descripcion <?php echo $f['descripcion'];?></span><br>
				<a href="./carritodecompras.php?id=<?php echo $f['id']?>">Agregar Al Carrito</a>
			</center>
		</div>
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>