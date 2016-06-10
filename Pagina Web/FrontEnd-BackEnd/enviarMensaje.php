<?php

	include_once("funciones.php");
	include_once("scriptsBBDD.php");
	if(!isset($_REQUEST["receptor"]) || !isset($_REQUEST["contenido"]) || $_REQUEST["emisor"] == "" || strpos($_REQUEST["receptor"],"<") != false || strpos($_REQUEST["emisor"],"<") != false){
	    header('Location: ./index.html?mess=1');
	    exit();
	}
	$asunto = $_REQUEST["asunto"];
	$contenido = $_REQUEST["contenido"];
	$emisor=$_REQUEST["emisor"];
	$receptor=$_REQUEST["receptor"];
	
	if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
		startDB();
		$idEmisor= getIdMascota($emisor, $_COOKIE["idUsu"]);
		if($idEmisor->num_rows == 0){
			header('Location: ./index.html?mess=6');
			exit();
		}
		$idMascotaEmi = $idEmisor->fetch_assoc();
		$aux = explode("@",$receptor);	// aux[0], mascota destino, aux[1], dueno destino
		if(count($aux) > 2){
			header('Location: ./index.html?mess=2');
			exit();
		}
		//Conectar BBDD
		include_once('scriptsBBDD.php');
		
		//Buscar usuario
		$idUsu= getIdUsuario($aux[1]);
		if($idUsu->num_rows == 0){
			header('Location: ./index.html?mess=3');
			exit();
		}
		$idUsuRec = $idUsu->fetch_assoc();
		$mascotasRec = getMascotasUsuario($idUsuRec["IDusuario"]);
		if($mascotasRec->num_rows == 0){
			header('Location: ./index.html?mess=4');
			exit();
		}
		
		$idMascotaRec = 0;
		for($i = 0; $i < $mascotasRec->num_rows && $idMascotaRec == 0; $i++){
			$row = $mascotasRec->fetch_assoc();
			$infoMasc = getInfoMascota($row["IDmascota"])->fetch_assoc();
			$nombreMasc = $infoMasc["Nombre"];
			if(strcmp($nombreMasc, $aux[0]) == 0){
				$idMascotaRec = $row["IDmascota"];
			}
		}
		
		if($idMascotaRec == 0){
			 header('Location: ./index.html?mess=5');
			exit();
		}
		else{
			insertaNuevoMensaje($idMascotaEmi["IDmascota"], $idMascotaRec, $asunto, getdate(), $contenido, 0);
		}
		
		closeDB();
		//Actualizar variables de sesión
		header('Location: ./mensajeria.html?corr=0');
	}
	else{
		header('Location: ./index.html?mess=6');
		exit();
	}
?>