<?php
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();

	$descripcion = $_REQUEST["comentario"];
	$IDpost = $_REQUEST["idp"];
	$IDespecialista = $_REQUEST["idE"];
	$IDmascota = $_REQUEST["Nmasc"];

	insertaNuevoComentario(0, $descripcion, $IDmascota, $IDespecialista, $IDpost);
	


	closeDB();

	header('Location: ./index.html');
?>