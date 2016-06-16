<?php
	include_once("funciones.php");
	include_once("scriptsBBDD.php");
	
	$mascota = $_REQUEST["masc"];
	$id = $_REQUEST["id"];

	if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
		if($mascota == "true"){
			$target_path = "assets/pets-images/".$id;
			startDB();
			move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path);
			actualizaFotoMascota($id, $target_path);
			closeDB();
			header('Location: ./info.html?masc=true&id=' . $id);
		}
		else{
			$target_path = "assets/profile-images/".$id;
			startDB();
			move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path);
			actualizaFotoUsuario($id, $target_path);
			closeDB();
			header('Location: ./info.html?masc=false&id=' . $id);
		}
	}
?>