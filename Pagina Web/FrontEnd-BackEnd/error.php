<html>
<head>
	<title>Petzeal</title>
	<meta charset="utf-8"</meta>
	<link rel="stylesheet" type="text/css" href="cssreset.css"/>			
 	<link rel="stylesheet" type="text/css" href="estructura.css" />
 	<link rel="stylesheet" type="text/css" href="interfaz.css"/>
	<script type="text/javascript" src="jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="error.js"></script>
	<script type="text/javascript" src="funciones.js"></script>
</head>

<?php
	include_once("funciones.php");
	include_once("scriptsBBDD.php");
	$error = $_REQUEST["err"];

	if($error == 0){
		echo '<body>';
	}
	else if($error == 1 || $error == 2){
		echo '<body onload="alert(\'Nombre de usuario inválido\')">';
	}
	else if($error == 3){
		echo '<body onload="alert(\'Contraseña incorrecta\')">';
	}
?>

	<div id="header"></div>
	<div id="slideIzq"></div>
	<div id="content"></div>
	<div id="slideDer"></div>
	
</body>
</html>

