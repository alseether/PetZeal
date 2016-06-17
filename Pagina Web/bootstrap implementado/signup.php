<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$tipo=$_REQUEST["tipo"];
	if($tipo == "usu"){		
		if(!isset($_REQUEST["nick"]) || !isset($_REQUEST["email"]) || !isset($_REQUEST["cp"]) || !isset($_REQUEST["pwd"])  || $_REQUEST["nick"] == "" || $_REQUEST["email"] == "" || $_REQUEST["cp"] == "" || $_REQUEST["pwd"] == ""
			|| strpos($_REQUEST["nick"],"<") != false || strpos($_REQUEST["email"],"<") != false || strpos($_REQUEST["cp"],"<") != false || strpos($_REQUEST["pwd"],"<") != false){
			header('Location: ./error.php?err=4');
			exit();
		}
		$nick=$_REQUEST["nick"];
		$cp = $_REQUEST["cp"];
		$email = $_REQUEST["email"];
		$rol = "User";
		
		//Buscar usuario
		$idQuery = getIdUsuario($nick);
		if($idQuery->num_rows > 0){
			header('Location: ./error.php?err=5');
			exit();
		}
		insertaNuevoUsuario($nick, "", $email, $rol, $cp, "", "", "", "", "","", "");
		$idUsu = getIdUsuario($nick)->fetch_assoc();
		
		$pwd = newSecurePass($idUsu["IDusuario"], $_REQUEST["pwd"]);
		actualizaPassword($idUsu["IDusuario"], $pwd);

		setcookie("log", true, time() + (24*3600));	// tiempo de expiracion, 1 dia
		setcookie("idUsu", $idUsu["IDusuario"], time() + (24*3600));
		setcookie("nick", $nick, time() + (24*3600));
		setcookie("rol", $rol, time() + (24*3600));
		header('Location: ./index.html');
	}
	else if($tipo == "premium"){
		if(!isset($_REQUEST["nombre"]) || !isset($_REQUEST["direccion"]) || !isset($_REQUEST["tlf"]) || !isset($_REQUEST["ocupacion"]) ||!isset($_REQUEST["web"])
			|| $_REQUEST["nombre"] == "" || $_REQUEST["direccion"] == "" || $_REQUEST["tlf"] == "" || $_REQUEST["ocupacion"] == "" || $_REQUEST["web"] == "" || $_REQUEST["descripcion"] == "" 
			|| strpos($_REQUEST["nombre"],"<") != false || strpos($_REQUEST["direccion"],"<") != false || strpos($_REQUEST["tlf"],"<") != false || strpos($_REQUEST["ocupacion"],"<") != false || strpos($_REQUEST["web"],"<") != false || strpos($_REQUEST["descripcion"],"<") != false){
			header('Location: ./error.php?err=6');
			exit();
		}

		$rol = "Premium";
		$nombre=$_REQUEST["nombre"];
		$direccion=$_REQUEST["direccion"];
		$tlf=$_REQUEST["tlf"];
		$ocupacion=$_REQUEST["ocupacion"];
		$web=$_REQUEST["web"];
		$descripcion=$_REQUEST["descripcion"];
		$imagen = $_REQUEST["imagen"];
		
		$info = getInfoUsuario($_COOKIE["idUsu"])->fetch_assoc();
		actualizaInfoUsuario($_COOKIE["idUsu"], $info["Nick"], $info["Password"], $info["Email"], $rol, $info["CP"], $nombre, $direccion, $tlf, $ocupacion, $web, $descripcion, $imagen);
		$target_path = "assets/pets-images/".$_COOKIE["idUsu"];
		move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path);
		actualizaFotoUsuario($_COOKIE["idUsu"], $target_path);
		setcookie("rol", "", time() - 3600);
		setcookie("rol", $rol, time() + (24*3600));
		header('Location: ./index.html');
	}
	else{
		
		if(!isset($_REQUEST["especie"]) || !isset($_REQUEST["nombre"]) || !isset($_REQUEST["raza"]) || !isset($_REQUEST["edad"]) ||!isset($_REQUEST["descripcion"])  
			|| strpos($_REQUEST["especie"],"<") != false || strpos($_REQUEST["nombre"],"<") != false || strpos($_REQUEST["raza"],"<") != false || strpos($_REQUEST["edad"],"<") != false ||  strpos($_REQUEST["descripcion"],"<") != false){
			header('Location: ./error.php?err=7');
			exit();
		}
		
		$especie=$_REQUEST["especie"];
		$nombre=$_REQUEST["nombre"];
		$raza=$_REQUEST["raza"];
		$nacimiento=$_REQUEST["edad"];
		$descripcion=$_REQUEST["descripcion"];

		insertaNuevaMascota($nombre, $especie, $raza, $nacimiento, $descripcion, "", $_COOKIE["idUsu"]);

		$idMasc = getIdMascota($nombre, $_COOKIE["idUsu"])->fetch_assoc();
		$target_path = "assets/profile-images/".$idMasc["IDmascota"];
		move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path);
		actualizaFotoMascota($idMasc["IDmascota"], $target_path);
		header('Location: ./index.html');
	}
	closeDB();
	
?>