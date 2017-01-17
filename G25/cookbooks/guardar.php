<?php
	if ($_POST["nombre_libro"] && $_POST["idA"] && $_POST["precio"] && $_POST["idioma"] && $_POST["editorial"] && $_POST["cantPaginas"] && $_POST["isbn"] && $_POST["fecha_pub"] && $_FILES["tapa"] && $_FILES["paginas"]){
		require("managerBD.php");
		$nombreL= mysql_real_escape_string($_POST["nombre_libro"]);
		$idA= mysql_real_escape_string($_POST["idA"]);  //Se usa cuando agregamos el combox a altalibro.php. Insertamos en libro_has_autor $autor e $isbn
		$precio= mysql_real_escape_string($_POST["precio"]);
		$idioma= mysql_real_escape_string($_POST["idioma"]);
		$editorial= mysql_real_escape_string($_POST["editorial"]);
		$cantPaginas= mysql_real_escape_string($_POST["cantPaginas"]);
		$isbn= mysql_real_escape_string($_POST["isbn"]);
		$fecha_pub= mysql_real_escape_string($_POST["fecha_pub"]);
		$vars= get_defined_vars();
		$rutaDestinoTapa="imagenes/" . basename($_FILES['tapa']['name']);
		if(move_uploaded_file($_FILES['tapa']['tmp_name'], $rutaDestinoTapa)) {
    		//echo "The file ".  basename( $_FILES['tapa']['name']). " has been uploaded", "<BR/>";
		} else{
    		//echo "There was an error uploading the file, please try again!","<BR/>";
		}
		$rutaDestinoPaginas="imagenes/" . basename($_FILES['paginas']['name']);
		if(move_uploaded_file($_FILES['paginas']['tmp_name'], $rutaDestinoPaginas)) {
    		//echo "The file ".  basename( $_FILES['paginas']['name']). " has been uploaded","<BR/>";
		} else{
    		//echo "There was an error uploading the file, please try again!","<BR/>";
		}

		$consulta="INSERT INTO libro (isbn, idioma, nombreL, precio, editorial, cantPaginas, fecha_pub, tapa, paginas) 
					VALUES ('$isbn', '$idioma', '$nombreL', '$precio', '$editorial', '$cantPaginas', '$fecha_pub', '$rutaDestinoTapa', '$rutaDestinoPaginas')";
		$ejecutarConsulta= mysql_query($consulta);
		echo mysql_error();
		if (mysql_affected_rows() > 0){

			$consulta="INSERT INTO libro_has_autor (libro_isbn, autor_autor_id) VALUES ('$isbn', '$idA')";
			$ejecutarConsulta= mysql_query($consulta);
			echo mysql_error();
			if (mysql_affected_rows() > 0){

				if (isset($_POST['etiquetas'])){
					foreach ($_POST['etiquetas'] as $eti) {
						$realEti=mysql_real_escape_string($eti);
						$consulta="INSERT INTO libro_has_etiqueta (libro_isbn, etiqueta_nombre) VALUES ('$isbn', '$realEti')";
						$re=mysql_query($consulta) or die(mysql_error());
					}
					
				}
				echo "Se realizo correctamente el alta.";
				header("refresh:4;url=altalibro.php");
			}
			else{
				echo $ejecutarConsulta;
				echo "Error al insertar en libro_has_autor";
				header("refresh:6;url=altalibro.php");
			}
		}else{
			echo $ejecutarConsulta;
			echo "Ocurrio un error al guardar los datos";
			header("refresh:6;url=altalibro.php");
		}
		include("cerrarConexion.php");
	}
?>