<?php
	include_once("funciones.php");
	include_once("scriptsBBDD.php");
	$mascota = $_GET["masc"];
	$idAccedido = $_GET["id"];

	if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true && isset($_COOKIE["rol"])){
		if($mascota == "true"){
			startDB();
			$query = getMascotasUsuario($_COOKIE["idUsu"]);
			$i = 0;
			$encontrado = false;
			while($i < $query->num_rows && !$encontrado){
				$row = $query->fetch_assoc();
				$encontrado = ($row["IDmascota"] == $idAccedido);
				$i++;
			}
			closeDB();

			if($encontrado)
				include("infoMascota.html");//PONER COMO PHP PARA TRATAR LA CONSULTAS A LA BASE DE DATOS
			else
				include("infoMascotaOtro.html");//PONER COMO PHP PARA TRATAR LA CONSULTAS A LA BASE DE DATOS
		}
		else if($_COOKIE["rol"] == "User"){
			if($idAccedido == $_COOKIE["idUsu"])
				include("infoUsuario.html");//PONER COMO PHP PARA TRATAR LA CONSULTAS A LA BASE DE DATOS
		}
		else{
			if($idAccedido == $_COOKIE["idUsu"])
				include("infoPremium.html");//PONER COMO PHP PARA TRATAR LA CONSULTAS A LA BASE DE DATOS
			else
				include("infoPremiumOtro.html");//PONER COMO PHP PARA TRATAR LA CONSULTAS A LA BASE DE DATOS
		}
	}
?>