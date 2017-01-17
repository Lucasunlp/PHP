<?php
	session_start();
	include './managerBD.php';
	if(isset($_SESSION['carrito'])){ //Me fijo si existe la variable tipo session

		if(isset($_GET['isbn'])){  // Si existe , me guardo los datos en un arreglo.

					$arreglo=$_SESSION['carrito'];
					$encontro=false;
					$numero=0;
					for($i=0;$i<count($arreglo);$i++){   //Recorro el arreglo para ver si existe el producto.
						if($arreglo[$i]['isbn']==$_GET['isbn']){
							$encontro=true;
							$numero=$i;
						}
					}
					if($encontro==true){
						$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
						$_SESSION['carrito']=$arreglo;
					
					}else{  //Busco en la base de datos el producto .
						$nombre="";
						$precio=0;
						$imagen="";
						$re=mysql_query("select * from libro where isbn=".$_GET['isbn']);
						while ($f=mysql_fetch_array($re)) {
							$nombre=$f['nombreL'];
							$precio=$f['precio'];
							$imagen=$f['tapa'];
						}
						$datosNuevos=array('isbn'=>$_GET['isbn'],  
										'Nombre'=>$nombre,
										'Precio'=>$precio,
										'Imagen'=>$imagen,
										'Cantidad'=>1);

						array_push($arreglo, $datosNuevos); //inserto los datos nuevos en el arreglo original.
						$_SESSION['carrito']=$arreglo; // guardo los datos de la session en el arreglo.

					}
		}




	}else{		//Primer compra (no $_SESSION[carrito]))
		if(isset($_GET['isbn'])){
			$nombre="";
			$precio=0;
			$imagen="";
			$re=mysql_query("select * from libro where isbn=".$_GET['isbn']);
			while ($f=mysql_fetch_array($re)) {
				$nombre=$f['nombreL'];
				$precio=$f['precio'];
				$imagen=$f['tapa'];
			}
			$arreglo[]=array('isbn'=>$_GET['isbn'],
							'Nombre'=>$nombre,
							'Precio'=>$precio,
							'Imagen'=>$imagen,
							'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
    <style type="text/css">
        
        body {
		  	padding-top: 50px;
		  	padding-bottom: 20px;
		}

    </style>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
</head>

<body>
	<header>
		<center><h1>Carrito de compras</h1></center>

	</header>

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php">CookBook</a>
            </div>
            <div class="navbar-collapse collapse">
                <form class="navbar-form navbar-right" role="form">
                    <div>
                       <p style="color:white;font-family:Verdana;font-weight:Bold;"> Bienvenido <a href="miCuenta.php"><?php echo $_SESSION['nombre']?></a> <a style="color:white;font-size:0.8em;text-decoration:none" href="logout.php">(Salir)</a>
                       <?php 
                       if ($_SESSION['esAdmin']){
                        ?>
                          <a style="font-family:Verdana;font-weight:Bold;" href="admin.php"> <right>Herramientas </right></a>
                        <?php
                       }
                       ?>
                          <a href="./carritodecompras.php" title="ver carrito de compras">
                          <img src="./imagenes/carrito.png">
                          </a>
                      </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
	<section>
		<?php
			$total=0;
			if(isset($_SESSION['carrito'])){
			$datos=$_SESSION['carrito'];
			
			$total=0;
			?>
			<table class= "table table-striped">
				<thead>
				<tr> <th> </th><th>Libro</th> <th>Precio</th> <th> Cantidad </th></tr>
				</thead>
			<?php
			for($i=0;$i<count($datos);$i++){
				
			?>
				<tbody>
					<div class="producto">
						<center>

						<td>	<img style="width:200px; height:230px;" src="<?php echo $datos[$i]['Imagen'];?>"><br> </td>
						<td	<span ><?php echo $datos[$i]['Nombre'];?></span><br> </td>
						<td><span>Precio: <?php echo $datos[$i]['Precio'];?></span><br></td>
						<td><span>Cantidad: 
								<input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
								data-precio="<?php echo $datos[$i]['Precio'];?>"
								data-id="<?php echo $datos[$i]['Id'];?>"
								class="cantidad">
							</span><br>
						</td>
							<td><span class="subtotal">Subtotal:<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span><br></td>
							
						</center>
					</div>

				</tbody>
			<?php $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;

			}
			?>
			

			<center> <a href="vaciarCarrito.php"> <button type="button" class="btn btn-primary btn-xs" > <p style= "font-size:12px; font-weight:Bold;"> Vaciar Carrito </p></button></a></center>

			<?php
				
			}else{
				echo '<center><h2>No has agregado ningun producto</h2></center>';
			}
			echo '<center><h2 id="total">Total: '.$total.'</h2></center>';
		
		?>
		
		

		
		

		
	</section>
</body>
</html>