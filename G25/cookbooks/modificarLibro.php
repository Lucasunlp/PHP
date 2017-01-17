<?php
	require("managerBD.php");
	$isbn=mysql_real_escape_string($_GET['isbn']);
	$consulta= "SELECT * FROM libro WHERE isbn='$isbn'";
	$matchLibro=mysql_query($consulta) or die(mysql_error());
	$libro=mysql_fetch_array($matchLibro);
	$consulta= "SELECT * from autor WHERE borrado=0";
  	$matchAutores=mysql_query($consulta) or die(mysql_error());
?>

<!DOCTYPE html>
<html>
 <head>
	<title> Modificar Libro	</title>

	<script lang="javascript">
	  function validar(){

		 if(formulario.nombre_libro.value=='')
	     {
	     alert('Tienes que introducir un nombre de libro');
	    }
	     if(formulario.autor.value=='')
	     {
	     alert('Tienes que escribir un autor');
	    }
	    if(formulario.precio.value=='')
	    {
	        alert('Tienes que escribir un precio');
	    }   
		if(formulario.idioma.value=='')
	    {
	        alert('Tienes que escribir un idioma');
	    }   
		if(formulario.editorial.value=='')
	    {
	        alert('Tienes que escribir una editorial');
	    }   
		
		if(formulario.paginas.value=='')
	    {
	        alert('Tienes que escribir un numero de paginas');
	    }   
		
		if(formulario.isbn.value=='')
	    {
	        alert('Tienes que escribir un numero de isbn');
	    }   
		
		if(formulario.fecha_pub.value=='')
	    {
	        alert('Tienes que escribir una fecha de publicacion');
	    }   
	}
	 </script>
 
 <script lang="javascript">
function txNombres2(autor) {
 if ((autor != 32) && (autor < 65) || (autor> 90) && (autor < 97) || (autor > 122))
 
  event.returnValue = true;
	alert ('solamente letras')
 

}
 
 </script>
 
 
 <script lang="javascript">
function txNombres1(nombre_libro) {
 if ((nombre_libro !=32 ) && (nombre_libro < 65) || (nombre_libro>90) && (nombre_libro < 97) || (nombre_libro > 122))
 
	(event.returnValue = true) 
		alert ('Borre, e Ingrese Solamente Letras')
	
     

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
 <script lang="javascript">
  function soloLetras2(e){
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
  function soloLetras3(e){
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
  function soloLetras4(e){
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
  

    function validarNumeros1(e) { // 1
        tecla = (document.all) ? e.keyCode : e.which; // 2
        if (tecla==8) return true; // backspace
        if (tecla==109) return true; // menos
    if (tecla==110) return true; // punto
        if (tecla==189) return true; // guion
        if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
        if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
        if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
        if (tecla>=96 && tecla<=105) { return true;} //numpad
 
        patron = /[0-9]/; // patron
 
        te = String.fromCharCode(tecla); 
        return patron.test(te); // prueba
    }
 
 </script> 
 
  <script lang="javascript">
  

    function validarNumeros2(e) { // 1
        tecla = (document.all) ? e.keyCode : e.which; // 2
        if (tecla==8) return true; // backspace
        if (tecla==109) return true; // menos
    if (tecla==110) return true; // punto
        if (tecla==189) return true; // guion
        if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
        if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
        if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
        if (tecla>=96 && tecla<=105) { return true;} //numpad
 
        patron = /[0-9]/; // patron
 
        te = String.fromCharCode(tecla); 
        return patron.test(te); // prueba
    }
 
 </script> 
   <script lang="javascript">
  

    function validarNumeros3(e) { // 1
        tecla = (document.all) ? e.keyCode : e.which; // 2
        if (tecla==8) return true; // backspace
        if (tecla==109) return true; // menos
    if (tecla==110) return true; // punto
        if (tecla==189) return true; // guion
        if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
        if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
        if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
        if (tecla>=96 && tecla<=105) { return true;} //numpad
 
        patron = /[0-9]/; // patron
 
        te = String.fromCharCode(tecla); 
        return patron.test(te); // prueba
    }
 
 </script> 
	</head>
<body>

   <form action="modLibro.php" method="post" name="formulario" style="text-align:left;font-family:Arial;font-size: 12px" enctype="multipart/form-data">
   																													
																																																																																																
		<LABEL for="nombre_libro">Nombre de Libro: </LABEL><BR/>											   
		<INPUT type="text" id="nombre_libro"onkeypress="return soloLetras1(event)" name="nombre_libro" value="<?php echo $libro['nombreL'];?>"> <BR/>
			
		<LABEL for="nombreA">Autor: </LABEL><BR/>												
        <SELECT name="idA">
        <?php 
        $idAutor=array();
        while ($resultado=mysql_fetch_array($matchAutores)) {
        	$idAutor=$resultado['autor_id'];

        ?>
        <option value="<?= $idAutor?>"> <?php echo $resultado['nombreA']?></option>
        <?php
        }
        ?>
        </SELECT>
        <span> <a href="altaAutor.php"><button type="button">Nuevo Autor</button></a>


        <BR/>

    <LABEL for="precio">Precio: </LABEL><BR/>											
		<INPUT type="number" onkeydown="return validarNumeros3(event)" id="precio" name="precio" value="<?php echo $libro['precio'];?>"> <BR/>
			
    <LABEL for="idioma">Idioma: </LABEL><BR/>											
		<INPUT type="text" id="idioma" name="idioma"  onkeypress="return soloLetras3(event)" value="<?php echo $libro['idioma'];?>"> <BR/>
		
		<LABEL for="editorial">Editorial: </LABEL><BR/>
		<INPUT type="text" id="editorial" name="editorial"  onkeypress="return soloLetras4(event)" value="<?php echo $libro['editorial'];?>"> <BR/>
		
		<LABEL for="cantPaginas">Numero de Paginas: </LABEL><BR/>
	  <INPUT type="number" onkeydown="return validarNumeros1(event)" id="cantPaginas" name="cantPaginas" value="<?php echo $libro['cantPaginas'];?>"> <BR/>
		
	  <LABEL for="isbn">ISBN: </LABEL><BR/>
		<INPUT type="number" onkeydown="return validarNumeros2(event)" id="isbn" name="isbn" value="<?php echo $libro['isbn'];?>"> <BR/>
		
	  <LABEL for="fecha_pub">Fecha de Publicacion: </LABEL><BR/>
		<INPUT type="date" id="fecha_pub" name="fecha_pub" required value="<?php echo $libro['fecha_pub'];?>"> <BR/>

    <LABEL for="etiquetas[]"> Etiquetas: </LABEL> <br/>
   <?php
    $consultaEtiquetas= "SELECT * FROM etiqueta WHERE borrado=0";
    $match=mysql_query($consultaEtiquetas) or die(mysql_error());
      
    while ($resuEti=mysql_fetch_array($match)) {
        $eti=mysql_real_escape_string($resuEti['nombreE']);
        $libro_isbn=mysql_real_escape_string($libro['isbn']);
        $consulta="SELECT * FROM libro_has_etiqueta WHERE etiqueta_nombre='$eti' AND libro_isbn='$libro_isbn'";
        $matchEtiquetas=mysql_query($consulta) or die(mysql_error());
        if (mysql_num_rows($matchEtiquetas) > 0){
        	?>
        	<INPUT type="checkbox" name="etiquetas[]" value="<?= $eti?>" checked> <?php echo $eti;?> </INPUT>
        	
        	<?php
        }
        else{
        	?>
        	<INPUT type="checkbox" name="etiquetas[]" value="<?= $eti?>"> <?php echo $eti;?> </INPUT>

        	<?php
        }
    }
   ?>

    <br/>
    <br/>
		<LABEL for="tapa">Tapa: </LABEL><br/>
		<input id="tapa" name="tapa" type="file" /> <br/> 

    <LABEL for="paginas">Primeras paginas: </LABEL><br/>
    <input id="paginas" name="paginas" type="file" /> <br/> 

    <INPUT type="hidden" id="isbn_viejo" name="isbn_viejo" value="<?php echo $isbn;?>"> </INPUT>

		<br/>
		<INPUT type="submit" value="Guardar" onClick= "validar()";"soloLetras1()";"return soloLetras2()";"return soloLetras3()""return soloLetras4()";"return validarNumeros1()";"return validarNumeros2()";"return validarNumeros3()";/>
		<INPUT type="reset" value="Cancelar"><BR/>
		<a style="text-decoration:none" href="adminlibro.php">  <INPUT type="button" value="Atras" style="font-family:Arial; height: 25px; font-size:14px; line-height: 10px;"> </INPUT> </a>

   </form>
</body>
</html>