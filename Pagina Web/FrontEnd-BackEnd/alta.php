<?php
	include("funciones.php");
	$premium = $_GET["pr"];

	if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
		if(isset($_COOKIE["rol"])){
			if($_COOKIE["rol"] == "User" && $premium == "true"){
				// El usuario es User y quiere hacerse Premium
				include("altaPremium.html");
			}
			else{
				// Un usuario quiere registrar una mascota
				include("altaMascota.html");
			}
		}
	}
	else{
		// Registro de usuario
		include("altaUsuario.html");
	}

?>