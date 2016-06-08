<?php
	include_once("funciones.php");
	include_once("scriptsBBDD.php");
	startDB();
	$mascota = $_REQUEST["masc"];
	$id = $_REQUEST["id"];

	if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true && isset($_COOKIE["rol"])){
		//Mostrar mensaje para confirmar que se quiere borrar el usuario o mascota
		if($mascota == "true"){
			eliminaMascota($id);
		}
		else {
			eliminaUsuario($id);
			setcookie("log", false, time() + (24*3600));	// tiempo de expiracion, 1 dia
			setcookie("idUsu", NULL, time() + (24*3600));
			setcookie("nick", NULL, time() + (24*3600));
			setcookie("rol", NULL, time() + (24*3600));
		}
	}
	closeDB();

	header('Location: ./index.html');
?>