<?php
	include_once("funciones.php");
	include_once("scriptsBBDD.php");
	$mascota = $_REQUEST["masc"];
	$id = $_REQUEST["id"];
	$imagen = $_REQUEST["imagen"];
	//if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
		if($mascota == "true"){
			startDB();
			subir_fichero('imagenesCR',$imagen);
			actualizaFotoMascota($id, $imagen);
			closeDB();
			header('Location: ./info.html?masc=true&id=' + $id);
		}
		else{
			startDB();
			subir_fichero('imagenesCR',$imagen);
			actualizaFotoUsuario($id, $imagen);
			closeDB();
			header('Location: ./info.html?masc=false&id=' + $id);
		}
	//}
	//header('Location: ./index.html');
?>