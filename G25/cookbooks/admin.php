<?php
    if(empty($_SESSION)) 
        session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>CookBook | Administrador</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

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
	<?php

    if(($_SESSION['esAdmin']) ==0) { // Si no es "admin"
        header("location: home.php"); // lo mando al "home"
        exit; 
    }
    else{
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
                      </p>
                    </div>
                </form>
            </div>
        </div>
		
	</div>
		<center> 											

		<form action="adminlibro.php" method="post" name="formulario">   

		<INPUT type="submit" value="  Administrar Libros  "   <div style="height: 50px; text-align: center; font-size:20px; line-height: 10px" /div> 
		
		</form> 
			<form action="adminautor.php" method="post" name="formulario">   
			<INPUT type="submit" value="Administrar Autores  " <div style="height: 50px; text-align: center; font-size:20px; line-height: 10px" /div> 
		</form> 
		
		<form action="adminetiqueta.php" method="post" name="formulario">  
			<INPUT type="submit" value="Administrar Etiquetas" <div style="height: 50px; text-align: center; font-size:20px; line-height: 10px;" /div>
		</form>
		</center> 
	<?php
	}
	?>
	</body>
</html>												