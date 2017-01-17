<?php	
	session_start(); // Uso variables de session para guardar los datos.
	include "./conexion.php";
	if(isset($_SESSION['carrito1 '])) {  //Verifico que exista var session, si existe guardo.
		$arreglo=$_SESSION['carrito1']; //Guardo la que existe
		$encontro=false; 
		$numero=0;
		for ($i=0;$i<count($arreglo);$i++){ //Recorro para guardar, y verifico que exista el producto
			if($arreglo[$i]['id']==$_GET['id']){
				$encontro=true;   //Encontre producto en el arreglo.
				$numero=$i;
			
			}
		
		}
		if($encontro==true){
			$arreglo[$numero]['cantidad']=$arreglo[$numero]['cantidad']+1; //
			$_SESSION['carrito1']=$arreglo; //Guardo en la variable de session el producto.
		
		}
			
	
	} else{
		if(isset($_GET['id'])){
			$nombre=" ";
			$precio=0;
			$imagen="";
			$re=mysql_query("select * from carrito where id=".$_GET['id']);
			while ($f=mysql_fetch_array($re)){
				$nombre=$f['nombre'];
				$precio=$f['precio'];
				$imagen=$f['imagen'];
				}
			$arreglo[]=array ('id' =>$_GET['id'],
						      'nombre'=>$nombre,
							  'precio'=>$precio,
							  'imagen'=>$imagen,
							  'cantidad' =>1);
			$_SESSION['carrito1']=$arreglo;
							  
			
			
		}
	
	}
?>


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
		<h1>Carrito de Compras</h1>
		<a href="./carritodecompras.php" title="ver carrito de compras">
			<img src="./imagenes/carrito.png">
		</a>
	</header>
	<section>
		<?php 
			$total=0; // Guarda todas las compras.
			if(isset($_SESSION['carrito1 '])) {   //Verifico si existe la variable de session.
				$datos=$_SESSION['carrito1 ']; //Si existe , Session me trae un arreglo, y lo guardo en datos.
				
				for ($i=0;$i<count($datos);$i++){
				?>
			 <div class="imagenes">
			   <center>
					<img src="./imagenes/<?php echo $datos[$i]['Imagen'];?>"<br>
					<span> <?php echo $datos [$i]['Nombre'];?> </span>	<br>	
					<span> Pecio:<?php echo $datos [$i]['Precio'];?> </span><br>
					<span> Cantidad:  <input type="text" value=<?php echo $datos [$i]['Cantidad'];?>></span>	<br>
					<span> Precio: <?php echo $datos [$i]['Precio']*$datos[$i]['Cantidad'];?> </span><br>
				</center>
			</div>
				<?php 
					$total=($datos [$i]['cantidad']*$datos[$i]['precio'])+$total;
			}
			}else {
				echo '<center><h2> El carrito de compra esta vacio</center></h2>';
			
			}	
				
			echo '<center><h2>Total: ' .$total. '</h2></center>';
			
		
	
		?>
		<center><a href="./">Ver Catalogo</a></center>;
		

		
	</section>
</body>
</html>