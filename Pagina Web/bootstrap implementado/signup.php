<?php
	include_once('scriptsBBDD.php');
	startDB();
	$tipo=$_REQUEST["tipo"];
	if($tipo = "usu"){
		if(!isset($_REQUEST["nick"]) || !isset($_REQUEST["email"]) || !isset($_REQUEST["cp"]) || !isset($_REQUEST["pwd"]) || strpos($_REQUEST["nick"],"<") != false || strpos($_REQUEST["email"],"<") != false || strpos($_REQUEST["cp"],"<") != false || strpos($_REQUEST["pwd"],"<") != false){
			header('Location: /index.html?mess=1');
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
			header('Location: /index.html?mess=2');
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