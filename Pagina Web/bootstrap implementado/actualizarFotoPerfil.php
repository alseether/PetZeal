<?php
	include_once("funciones.php");
	include_once("scriptsBBDD.php");
	
	$mascota = $_REQUEST["masc"];
	$id = $_REQUEST["id"];

	if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
		if($mascota == "true"){
			$target_path = "assets/photoPet/".$id."/";
			if(!file_exists ($target_path))
				mkdir($target_path, 0777, true);
			$target_path = $target_path . basename( $_FILES['imagen']['name']); 
			startDB();
			move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path);
			actualizaFotoMascota($id, $target_path);
			closeDB();
			header('Location: ./info.html?masc=true&id=' . $id);
		}
		else{
			$target_path = "assets/photoUser/".$id."/";
			if(!file_exists ($target_path))
				mkdir($target_path, 0777, true);
			$target_path = $target_path . basename( $_FILES['imagen']['name']); 
			startDB();
			move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path);
			actualizaFotoUsuario($id, $target_path);
			closeDB();
			header('Location: ./info.html?masc=false&id=' . $id);
		}
	}
?>