<?php
    require("managerBD.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Alta de Autor</title>
    </head>
	<script lang="javascript">
  
 function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
 
 
 </script> 
 	<script lang="javascript">
  
 function soloLetras1(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
 
 
 </script> 
    <body>
        <form action="guardarAutor.php" method="post" name="formulario" style="text-align:left;font-family:Arial;font-size: 12px">
            <LABEL for="autor">Nombre del Autor:</LABEL><BR/>
            <INPUT type="text" id="autor" onkeypress="return soloLetras(event)" name="autor" required></INPUT><BR/>

            <LABEL for="nacionalidad">Nacionalidad:</LABEL><BR/>
            <INPUT type="text" id="nacionalidad" onkeypress="return soloLetras1(event)" name="nacionalidad" required></INPUT><BR/>

            <INPUT type="submit" value="Guardar" onkeypress="return soloLetras()";"return soloLetras1()";></INPUT>
            <INPUT type="reset" value="Cancelar"></INPUT><BR/>
            <a style="text-decoration:none" href="adminautor.php">  <INPUT type="button" value="Atras" style="font-family:Arial; height: 25px; font-size:14px; line-height: 10px;"> </INPUT> </a>

        </form>
    </body>
</html>
