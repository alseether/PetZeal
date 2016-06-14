<?php
	include_once('scriptsBBDD.php');
	startDB();
	$tipo=$_REQUEST["tipo"];
	if($tipo = "usu"){
		if(!isset($_REQUEST["nick"]) || !isset($_REQUEST["email"]) || !isset($_REQUEST["cp"]) || !isset($_REQUEST["pwd"]) || strpos($_REQUEST["nick"],"<") != false || strpos($_REQUEST["email"],"<") != false || strpos($_REQUEST["cp"],"<") != false || strpos($_REQUEST["pwd"],"<") != false){
			header('Location: ./error.php?err=4');
			exit();
		}
		$nick=$_REQUEST["nick"];
		$cp = $_REQUEST["cp"];
		$email = $_REQUEST["email"];
		$pwd = $_REQUEST["pwd"];
		$rol = "User";
		
		//Buscar usuario
		$idQuery = getIdUsuario($nick);
		if($idQuery->num_rows > 0){
			header('Location: ./error.php?err=5');
			exit();
		}
		insertaNuevoUsuario($nick, $pwd, $email, $rol, $cp, "", "", "", "", "","", "");
		$idUsu = getIdUsuario($nick)->fetch_assoc();

		setcookie("log", true, time() + (24*3600));	// tiempo de expiracion, 1 dia
		setcookie("idUsu", $idUsu["IDusuario"], time() + (24*3600));
		setcookie("nick", $nick, time() + (24*3600));
		setcookie("rol", $rol, time() + (24*3600));
	}
	else if($tipo = "premium"){
		
		if(!isset($_REQUEST["nombre"]) || !isset($_REQUEST["direccion"]) || !isset($_REQUEST["tlf"]) || !isset($_REQUEST["ocupacion"]) ||!isset($_REQUEST["web"]) || !isset($_REQUEST["descripcion"]) || strpos($_REQUEST["nombre"],"<") != false || strpos($_REQUEST["direccion"],"<") != false || strpos($_REQUEST["tlf"],"<") != false || strpos($_REQUEST["ocupacion"],"<") != false || strpos($_REQUEST["web"],"<") != false || strpos($_REQUEST["descripcion"],"<") != false){
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
		actualizaInfoUsuario($_COOKIE["idUsu"], $info["Nick"], $info["Password"]), $info["Email"]), $rol, $info["CP"]), $nombre, $direccion, $tlf, $ocupacion, $web, $descripcion, $imagen);
		setcookie("rol", "", time() - 3600);
		setcookie("rol", $rol, time() + (24*3600));
	}
	else{
		
		if(!isset($_REQUEST["especie"]) || !isset($_REQUEST["nombre"]) || !isset($_REQUEST["raza"]) || !isset($_REQUEST["edad"]) ||!isset($_REQUEST["descripcion"])  || strpos($_REQUEST["especie"],"<") != false || strpos($_REQUEST["nombre"],"<") != false || strpos($_REQUEST["raza"],"<") != false || strpos($_REQUEST["edad"],"<") != false ||  strpos($_REQUEST["descripcion"],"<") != false){
			header('Location: ./error.php?err=7');
			exit();
		}
		
		$especie=$_REQUEST["especie"];
		$nombre=$_REQUEST["nombre"];
		$raza=$_REQUEST["raza"];
		$nacimiento=$_REQUEST["edad"];
		$descripcion=$_REQUEST["descripcion"];
		$imagen = $_REQUEST["imagen"];
		
		

		insertaNuevaMascota($nombre, $especie, $raza, $nacimiento, $descripcion, $imagen, $_COOKIE["idUsu"]);
	}
	closeDB();
	header('Location: /index.html');
?>