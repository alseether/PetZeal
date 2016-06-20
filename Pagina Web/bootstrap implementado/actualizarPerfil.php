<?php
	include_once("funciones.php");
	include_once("scriptsBBDD.php");
	startDB();
	$mascota = $_REQUEST["masc"];
	$id = $_REQUEST["id"];
	if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true && isset($_COOKIE["rol"])){
		if($mascota == "true"){
			if(!isset($_REQUEST["especie"]) || !isset($_REQUEST["nombre"]) || !isset($_REQUEST["raza"]) || !isset($_REQUEST["edad"]) 
			|| strpos($_REQUEST["especie"],"<") != false || strpos($_REQUEST["nombre"],"<") != false || strpos($_REQUEST["raza"],"<") != false || strpos($_REQUEST["edad"],"<") != false ||  strpos($_REQUEST["descripcion"],"<") != false){
				header('Location: ./error.php?err=8&id='.$id);
				exit();
			}
			$nombre = $_REQUEST['nombre'];
			$especie = $_REQUEST['especie'];
			$raza = $_REQUEST["raza"];
			$nacimiento = $_REQUEST["edad"];
			$descripcion = $_REQUEST["descripcion"]; 
			$datos = getInfoMascota($id)->fetch_assoc();
			actualizaInfoMascota($id, $nombre, $especie, $raza, $nacimiento, $descripcion, $datos["Imagen"], $_COOKIE["idUsu"]);
		}
		else{
			$nick = $_REQUEST["nick"];
			$email = $_REQUEST["email"];
			$cp = $_REQUEST["cp"]; 
			if($_COOKIE["rol"] == "User"){
				if(!isset($_REQUEST["nick"]) || !isset($_REQUEST["email"]) || !isset($_REQUEST["cp"])  || $_REQUEST["nick"] == "" || $_REQUEST["email"] == "" || $_REQUEST["cp"] == ""
				|| strpos($_REQUEST["nick"],"<") != false || strpos($_REQUEST["email"],"<") != false || strpos($_REQUEST["cp"],"<") != false){
					header('Location: ./error.php?err=9&id='.$id);
					exit();
				}
				$existe = getIdUsuario($nick);
				$datos = getInfoUsuario($id)->fetch_assoc();
				if($existe->num_rows == 0 || $datos["Nick"] == $nick){
					if($datos["Nick"] != $nick){
						setcookie("nick", "", time() - 3600);
						setcookie("nick", $nick, time() + (24*3600));
					}
					actualizaInfoUsuario($id, $nick, $datos["Password"], $email, "User", $cp, $nombre, "", "", "", "", "", "");
				}
			}
			else{
				if(!isset($_REQUEST["nick"]) || !isset($_REQUEST["email"]) || !isset($_REQUEST["cp"])  || $_REQUEST["nick"] == "" || $_REQUEST["email"] == "" || $_REQUEST["cp"] == ""
				|| strpos($_REQUEST["nick"],"<") != false || strpos($_REQUEST["email"],"<") != false || strpos($_REQUEST["cp"],"<") != false){
					header('Location: ./error.php?err=10&id='.$id);
					exit();
				}
				if(!isset($_REQUEST["nombre"]) || !isset($_REQUEST["direccion"]) || !isset($_REQUEST["tlf"]) || !isset($_REQUEST["ocupacion"]) ||!isset($_REQUEST["web"]) || !isset($_REQUEST["descripcion"]) 
					|| $_REQUEST["nombre"] == "" || $_REQUEST["direccion"] == "" || $_REQUEST["tlf"] == "" || $_REQUEST["ocupacion"] == "" || $_REQUEST["web"] == ""  
					|| strpos($_REQUEST["nombre"],"<") != false || strpos($_REQUEST["direccion"],"<") != false || strpos($_REQUEST["tlf"],"<") != false || strpos($_REQUEST["ocupacion"],"<") != false || strpos($_REQUEST["web"],"<") != false || strpos($_REQUEST["descripcion"],"<") != false){
					header('Location: ./error.php?err=10&id='.$id);
					exit();
				}
				$nombre = $_REQUEST["nombre"];
				$cp = $_REQUEST["cp"];
				$direccion = $_REQUEST["direccion"];
				$telefono = $_REQUEST["tlf"];
				$ocupacion = $_REQUEST["ocupacion"];
				$web = $_REQUEST["web"];
				$descripcion = $_REQUEST["descripcion"];
				$existe = getIdUsuario($nick);
				$datos = getInfoUsuario($id)->fetch_assoc();
				if($existe->num_rows == 0 || $datos["Nick"] == $nick){
					if($datos["Nick"] != $nick){			
						setcookie("nick", "", time() - 3600);
						setcookie("nick", $nick, time() + (24*3600));
					}
					actualizaInfoUsuario($id, $nick, $datos["Password"], $email, "Premium", $cp, $nombre, $direccion, $telefono, $ocupacion, $web, $descripcion, $datos["Imagen"]);
				}
			}
		}
	}
	closeDB();
	header('Location: ./index.html');
?>