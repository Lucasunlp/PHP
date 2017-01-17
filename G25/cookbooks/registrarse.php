<?php
     if (empty($_SESSION))
        session_start();
    require("managerBD.php");
  
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

        <title>Cookbooks | Registro</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="jumbotron-narrow.css" rel="stylesheet">

    </head>

    <body>
      
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
          
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php">CookBook </a>
            
            </div>
    </div>
    </div>
    
    <br>
    <br>
    <br>
    <div class="container">
            <div class="jumbotron">
                <p class="lead"><h2>Registrar Usuario</h2></p>
                <form action="altaUsuario.php" method="post" >

                    <LABEL for="nombre">Nombre: </LABEL><BR/>                                               
                    <INPUT type="text" id="nombre" name="nombre" required><BR/>
                                                    
                    <LABEL for="apellido">Apellido: </LABEL><BR/>                                             
                    <INPUT type="text" id="apellido" name="apellido" required><BR/>

                     <LABEL for="nombreU">Nombre de Usuario: </LABEL><BR/>                                             
                    <INPUT type="text" id="nombreU" name="nombreU" required><BR/>

                     <LABEL for="clave">Clave: </LABEL><BR/>                                             
                    <INPUT type="password" id="clave" name="clave" required><BR/>

                     <LABEL for="email">Email(*): </LABEL><BR/>                                             
                    <INPUT type="text" id="email" name="email"><BR/>

                    <LABEL for="telefono">Telefono(*): </LABEL><BR/>                                             
                    <INPUT type="text" id="telefono" name="telefono"><BR/>

                    <LABEL for="direccion">Direccion: </LABEL><BR/>                                             
                    <INPUT type="text" id="direccion" name="direccion" required><BR/>
                  <BR/>

                <button type="submit" class="btn btn-primary btn-sm">Enviar</button></a>
                <a href="home.php" role="button"> <button type="button" class="btn btn-primary btn-sm"> Cancelar</button></a>
                <br/>
                <br/>(*) Campo opcional            
            </div>

    </div>  <!--container -->
    </body>
</html>