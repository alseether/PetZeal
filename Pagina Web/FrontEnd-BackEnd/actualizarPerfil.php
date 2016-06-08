<?php
	include_once("funciones.php");
	include_once("scriptsBBDD.php");
	startDB();
	$mascota = $_REQUEST["masc"];
	$id = $_REQUEST["id"];
	if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true && isset($_COOKIE["rol"])){
		if($mascota == "true"){
			$nombre = $_POST['nombre'];
			$especie = $_POST['especie'];
			$raza = $_REQUEST["raza"];
			$nacimiento = $_REQUEST["nacimiento"];
			$descripcion = $_REQUEST["descripcion"]; 
			actualizaInfoMascota($id, $nombre, $especie, $raza, $nacimiento, $descripcion, NULL, $_COOKIE["idUsuario"]);
		}
		else{
			$nombre = $_POST['nombre'];
			$password = $_POST['pwd'];
			$nick = $_REQUEST["nick"];
			$email = $_REQUEST["email"];
			$cp = $_REQUEST["cp"]; 
			if($_COOKIE["rol"] == "User"){
				$existe = buscarNick($nick);
				$datos = getInfoUsuario($id)->fetch_assoc();
				if($existe->num_rows == 0 || $datos["Nick"] == $nick)
					actualizaInfoUsuario($id, $nick, $password, $email, "User", $cp, $nombre, NULL, NULL, NULL, NULL, NULL, NULL);
			}
			else{
				$cp = $_REQUEST["cp"];
				$direccion = $_REQUEST["direccion"];
				$telefono = $_REQUEST["telefono"];
				$ocupacion = $_REQUEST["ocupacion"];
				$web = $_REQUEST["web"];
				$descripcion = $_REQUEST["descripcion"];
				$existe = buscarNick($nick);
				$datos = getInfoUsuario($id)->fetch_assoc();
				if($existe->num_rows == 0 || $datos["Nick"] == $nick)
					actualizaInfoUsuario($id, $nick, $password, $email, "Premium", $cp, $nombre, $direccion, $telefono, $ocupacion, $web, $descripcion, NULL);
			}
		}
	}
	closeDB();
	header('Location: ./index.html');
?>