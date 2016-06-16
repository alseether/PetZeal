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
			eliminaSalt($id);
			setcookie("log", "", time() - 3600); //Crea la cookie con cadicidad hace una hora, por tanto la borra
			setcookie("idUsu", "", time() - 3600);
			setcookie("nick", "", time() - 3600);
			setcookie("rol", "", time() - 3600);
		}
	}
	closeDB();

	header('Location: ./index.html');
?>