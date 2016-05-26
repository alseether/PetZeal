<?php
	if(!isset($_REQUEST["nick"]) || !isset($_REQUEST["email"]) || !isset($_REQUEST["cp"]) || !isset($_REQUEST["pwd"]) || strpos($_REQUEST["nick"],"<") != false || strpos($_REQUEST["email"],"<") != false || strpos($_REQUEST["cp"],"<") != false || strpos($_REQUEST["pwd"],"<") != false){
		header('Location: /PetZeal-master/Pagina%20Web/FrontEnd-BackEnd/index.html?mess=1');
		exit();
	}
	$nick=$_REQUEST["nick"];
	$cp = $_REQUEST["cp"];
	$email = $_REQUEST["email"];
	$pwd = $_REQUEST["pwd"];
	$rol = "User";
	$imagen = "assets\profile-images\default.jpg";
	//Conectar BBDD
	include_once('scriptsBBDD.php');
	startDB();
	//Buscar usuario
	$idQuery = getIdUsuario($nick);
	if($idQuery->num_rows > 0){
		header('Location: /PetZeal-master/Pagina%20Web/FrontEnd-BackEnd/index.html?mess=2');
		exit();
	}
	insertaNuevoUsuario($nick, $pwd, $email, $rol, $cp, "", "", "", "", "","", $imagen);
	$idUsu = getIdUsuario($nick)->fetch_assoc();
//	$_SESSION["log"] = true;
	setcookie("log", true, time() + (24*3600));	// tiempo de expiracion, 1 dia
	setcookie("idUsu", $idUsu["IDusuario"], time() + (24*3600));
	setcookie("nick", $nick, time() + (24*3600));
	setcookie("rol", $rol, time() + (24*3600));
	//Actualizar variables de sesión
	header('Location: /PetZeal-master/Pagina%20Web/FrontEnd-BackEnd/index.html');
?>