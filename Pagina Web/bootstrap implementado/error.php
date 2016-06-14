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

	if($error > 0 && $error <=3)
		echo '<body onload="cargaIndex('.$error.')">';
	else if($error > 3 && $error <= 5){
		echo '<body onload="cargaAltaUsuario('.$error.')">';
	}
	else if($error == 6){
		echo '<body onload="cargaAltaPremium('.$error.')">';
	}
	else if($error== 7){
		echo '<body onload="cargaAltaMascota('.$error.')">';
	}
?>

	<div id="header"></div>
	<div id="slideIzq"></div>
	<div id="content"></div>
	<div id="slideDer"></div>
	
</body>
</html>

