<?php
	/*
	*   Este php será llamado mediante un enlace y enlazará a la página ppal si todo ha ido bien o a la del login 
	*   con el correspondiente error pasado por GET
	*/
	//Sacar datos y comprobarlos
	//$_SESSION["log"] = true;
	//session_start();
	//$_SESSION["log"] = false;
	if(!isset($_REQUEST["usuario"]) || !isset($_REQUEST["passwd"]) || $_REQUEST["usuario"] == "" || strpos($_REQUEST["usuario"],"<") != false || $_REQUEST["passwd"] == "" || strpos($_REQUEST["passwd"],"<") != false){
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