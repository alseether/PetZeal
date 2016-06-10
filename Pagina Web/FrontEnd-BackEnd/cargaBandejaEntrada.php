<?php
	include_once("funciones.php");
	include_once("scriptsBBDD.php");
	$mascota = $_REQUEST["masc"];
	$correoAbierto = $_REQUEST["corr"];
	startDB();
	echo '<table class="listaMensajes col-desktop-12 col-tablet-12 col-phone-12">';
		echo '<tr><td><h3>Bandeja de entrada</h3></td><td/><td/></tr>';
		
		$consulta = "select IDmensaje from mensajes WHERE IDreceptor = '".$mascota."' order by IDmensaje desc limit 50";
		
		$mensajes = query($consulta);
		for($j=0; $j < $mensajes->num_rows; $j++){
			$idMensaje = $mensajes->fetch_assoc();
			$mensaje = getInfoMensaje($idMensaje["IDmensaje"])->fetch_assoc();
			$idEmisor = $mensaje["IDemisor"];
			$emisor = getInfoMascota($idEmisor)->fetch_assoc();
			$idDuenoEmisor = $emisor["IDusuario"];
			$nombreDueno = getInfoUsuario($idDuenoEmisor)->fetch_assoc()["Nick"];
			if($mensaje["IDmensaje"] == $correoAbierto){
				actualizaInfoMensaje($mensaje["IDmensaje"], $mensaje["IDemisor"], $mensaje["IDreceptor"], $mensaje["Asunto"], $mensaje["Fecha"], $mensaje["Contenido"], 1);
				echo '<tr class="cabeceraMensajeR" onclick="openContMenRecibido(event, '.$mascota.',\''.$idMensaje["IDmensaje"].'\')">';
			}
			else{
				if($mensaje["Leido"] == 0){
					echo '<tr class="cabeceraMensajeR fondoRojo" onclick="openContMenRecibido(event, '.$mascota.',\''.$idMensaje["IDmensaje"].'\')">';
				}
				else{
					echo '<tr class="cabeceraMensajeR" onclick="openContMenRecibido(event, '.$mascota.',\''.$idMensaje["IDmensaje"].'\')">';
				}
			}
			echo '<td> De: <em>'.$emisor["Nombre"].'@'.$nombreDueno.'</em></td> <td>Asunto: <em>'.$mensaje["Asunto"].'</em></td> <td> Fecha: <em>'.$mensaje["Fecha"].'</em></td>';
			echo '</tr>';
			echo '<tr id="'.$mensaje["IDmensaje"].'" class="contenidoMensajeR"><td>'. $mensaje["Contenido"].' </td><td/><td/></tr>';
		}
	echo '</table>';
	closeDB();
?>