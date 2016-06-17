<script type="text/javascript" src="error.js"></script>
<script type="text/javascript" src="funciones.js"></script>

<?php
	include_once("funciones.php");
	include_once("scriptsBBDD.php");
	$error = $_REQUEST["err"];
	

	if($error > 0 && $error <=3){
		 header('Location: ./index.html?err='.$error);						// Errores en login
	}		
	else if($error > 3 && $error <= 5){
		header('Location: ./registro.html?err='.$error.'&pr=false');	// Errores en registro de usuario normal
	}
	else if($error == 6){
		header('Location: ./registro.html?err='.$error.'&pr=true');		// Error en registro premium
	}
	else if($error== 7){
		header('Location: ./registro.html?err='.$error.'&pr=false');	// Error en registro de mascota
	}
	else if($error== 8){
		$id = $_REQUEST["id"];
		header('Location: ./info.html?err='.$error.'&masc=true&id='.$id);	// Error al actualizar info de mascota
	}
	else if($error== 9){
		$id = $_REQUEST["id"];
		header('Location: ./info.html?err='.$error.'&masc=false&id='.$id);		// Error al actualizar info de usuario, el id se ignora
	}
	else if($error== 10){
		$id = $_REQUEST["id"];
		header('Location: ./info.html?err='.$error.'&masc=false&id='.$id);		// Error al actualizar info premium
	}
	else if($error >= 11 && $error <= 16){
		header('Location: ./mensajeria.html?err='.$error.'&corr=0');		// Errores de mensajeria
	}

	
	
	
?>


