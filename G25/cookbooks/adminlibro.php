<?php
  if (empty($_SESSION))
    session_start();
?>
	<!DOCTYPE html>
	<html>
		<head>
		<title>CookBook | Administracion de Libros</title>
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
										
		<center> 
				<a style="text-decoration:none" href="altalibro.php"</a> <button class="btn btn-primary"  style="font-size:1.1em;">  Agregar Libro	</button> </a>
		</center>

		<br>
		<center> 
				<?php
					include("listarlibros.php");
				?>	
		</center> 
		<br/>
		<center> 
				<a style="text-decoration:none;" href="admin.php"> <button class="btn btn-primary" style="font-size:1.1em;"> Atras </button> </a>
		</center> 				
		</body>
	</html>