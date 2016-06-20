<?php
	include_once("funciones.php");
	include_once("scriptsBBDD.php");
	$mascota = $_REQUEST["masc"];
	$idAccedido = $_REQUEST["id"];

	if($mascota == "true"){
		if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true && isset($_COOKIE["idUsu"])){
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
		else
			include("infoMascotaOtro.php");
	}
	else if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true && isset($_COOKIE["idUsu"]) && $idAccedido == $_COOKIE["idUsu"]){
			include("infoUsuario.php");
	}
	else{
		if(isset($_COOKIE["idUsu"]) && $idAccedido == $_COOKIE["idUsu"])
			include("infoPremium.php");
		else
			include("infoPremiumOtro.php");
	}
?>