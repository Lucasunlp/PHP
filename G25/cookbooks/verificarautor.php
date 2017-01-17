<?php
	require("managerBD.php");
$consulta = (SELECT * FROM autor  WHERE nombre= $_POST["autor"]);
$resultado= mysql_query ($consulta) or die (mysql_error());
if ( mysql_num_rows ($resultado) != 0) {
	if ($_POST["nombre_libro"] && $_POST["autor"] && $_POST["precio"] && $_POST["idioma"] && $_POST["editorial"] && $_POST["paginas"] && $_POST["isbn"] && $_POST["fecha_pub"]){
		$nombre_libro= mysql_real_escape_string($_POST["nombre_libro"]);
		$autor= mysql_real_escape_string($_POST["autor"]);
		$precio= mysql_real_escape_string($_POST["precio"]);
		$idioma= mysql_real_escape_string($_POST["idioma"]);
		$editorial= mysql_real_escape_string($_POST["editorial"]);
		$paginas= mysql_real_escape_string($_POST["paginas"]);
		$isbn= mysql_real_escape_string($_POST["isbn"]);
		$fecha_pub= mysql_real_escape_string($_POST["fecha_pub"]);
		$vars= get_defined_vars();
		print_r($vars);
		$consulta="INSERT INTO libro (isbn, idioma, nombre, editorial, precio, paginas, fecha_pub) 
					VALUES ('$isbn', '$idioma', '$nombre_libro', '$editorial', '$precio', '$paginas', '$fecha_pub')";
		$ejecutarConsulta= mysql_query($consulta);
		echo mysql_error();
		if (mysql_affected_rows() > 0){
			echo "Se realizo correctamente el alta.";
		
		}else{
			echo $ejecutarConsulta;
			echo "Ocurrio un error al guardar los datos";
		
		}
		include("cerrarConexion.php");
else{
	echo "Debe dar de alta un autor nuevo"
		}
?>