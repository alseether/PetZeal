<?php
	include_once("funciones.php");
	include_once("scriptsBBDD.php");
	$mascota = $_REQUEST["masc"];
	$idAccedido = $_REQUEST["id"];

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
				include("infoMascota.php");
			else
				include("infoMascotaOtro.php");
		}
		else if($_COOKIE["rol"] == "User"){
			if($idAccedido == $_COOKIE["idUsu"])
				include("infoUsuario.php");
		}
		else{
			if($idAccedido == $_COOKIE["idUsu"])
				include("infoPremium.php");
			else
				include("infoPremiumOtro.php");
		}
	}
?>