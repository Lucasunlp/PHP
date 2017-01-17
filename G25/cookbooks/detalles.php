<?php
  require("managerBD.php");
    if(empty($_SESSION)) {
        session_start();
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
	<script type="text/javascript"  href="./js/scripts.js"></script>
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
</head>
<body>

    <?php if (!isset($_SESSION['nombreU'])) {
    ?>    
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
            <form action="verificarClave.php" method="post" class="navbar-form navbar-right" role="form">
              <div class="form-group">
                <input type="text" placeholder="DNI" id="dni" name="dni" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="password" placeholder="Clave" id="clave" name="clave" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-success">Ingresar</button>
              <a href="registrarse.php"> <button type="button" class="btn btn-success">Registrarse</button> </a>
            </form>


          </div><!--/.navbar-collapse -->
        </div>
        </div>
    <?php } 
    else{
        ?>           <!-- Mostrar "Bienvenido 'Nombre'" en vez de DNI('nombreU' es un nro de dni) -->
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
    <?php 
    }
    ?>

	<header>
		<center><h1>Detalles</h1></center>
		</a>

	</header>
	<section>
		
	<?php
		$re=mysql_query("select * from libro where isbn=".$_GET['isbn'])or die(mysql_error());
		while ($f=mysql_fetch_array($re)) {
		?>
			
			<center>
				<img style="width:280px; height:350px;" src="<?php echo $f['tapa'];?>"/><br>
				<span><?php echo $f['nombreL'];?></span><br>
				<span>Precio: <?php echo $f['precio'];?></span><br>
				<span>Paginas:<?php echo $f['cantPaginas'];?></span><br>
				<span>Idioma: <?php echo $f['idioma'];?></span><br>
				<span><a href="bajarArchivo.php?dir=<?php echo $f['paginas'];?>" style= "text-decoration:none;" target="_blank">Descargar primeras paginas</a>
				</span>
				<br>

				<?php
				if (isset($_SESSION['nombreU'])) {
					?>
					<a href="./carritodecompras.php?isbn=<?php  echo $f['isbn'];?>">Agregar al carrito de compras</a>
				<?php
				}
				?>

			</center>
		
	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>