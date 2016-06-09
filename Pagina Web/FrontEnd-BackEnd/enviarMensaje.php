<?php

	if(!isset($_REQUEST["receptor"]) || !isset($_REQUEST["contenido"]) || $_REQUEST["usuario"] == "" || strpos($_REQUEST["usuario"],"<") != false || $_REQUEST["passwd"] == "" || strpos($_REQUEST["passwd"],"<") != false){
	    header('Location: ./index.html?mess=1');
	    exit();
	}
	$nick=$_REQUEST["usuario"];
	//$_SESSION["usu"]=$_REQUEST["usuario"];
	$passwd=$_REQUEST["passwd"];
	//Conectar BBDD
	include_once('scriptsBBDD.php');
	startDB();
	//Buscar usuario
	$idQuery = getIdUsuario($nick);
	$idUsu = $idQuery->fetch_assoc();
	$resto = getInfoUsuario($idUsu["IDusuario"]);
	if($resto->num_rows == 0){
	    header('Location: ./index.html?mess=2');
	    exit();
	}
	$reg=$resto->fetch_array();
	//Comprobar contraseña y asignar iduser
	if($passwd != $reg["Password"]){
	    header('Location: ./index.html?mess=3');
	    exit();
	}
	$rol=$reg["Rol"];
	closeDB();
//	$_SESSION["log"] = true;
	setcookie("log", true, time() + (24*3600));	// tiempo de expiracion, 1 dia
	setcookie("idUsu", $idUsu["IDusuario"], time() + (24*3600));
	setcookie("nick", $nick, time() + (24*3600));
	setcookie("rol", $rol, time() + (24*3600));
	//Actualizar variables de sesión
	header('Location: ./index.html');
?>