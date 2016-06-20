<?php
	include("funciones.php");
	$animal = $_REQUEST["animal"];

	switch ($animal) {
	    case 0:
	        include("informacion_aves.html");
	        break;
	    case 1:
	        include("informacion_gatos.html");
	        break;
	    case 2:
	        include("informacion_peces.html");
	        break;
	    case 3:
	        include("informacion_perros.html");
	        break;
	    case 4:
	        include("informacion_roedores.html");
	        break;
	}
?>