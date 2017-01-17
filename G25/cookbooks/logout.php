<?php
	require("managerBD.php");
	session_start();
	unset($_SESSION['nombreU']);
	unset($_SESSION['nombre']);
	unset($_SESSION['esAdmin']);
	session_destroy();
	header("Location: home.php");
	exit;
?>