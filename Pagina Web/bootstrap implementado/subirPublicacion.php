 <?php
 	include_once('scriptsBBDD.php');
 	include_once('funciones.php');
 	startDB();
 	
 	$idMas = $_REQUEST["id"];
 	$descripcion= $_REQUEST["descripcion"];
	$fecha = date("Y")."-".date("m")."-".date("d");
	
	insertaNuevaPublicacion($descripcion, $fecha, "", 0, $idMas);
	
	$consulta = "select IDpublicacion from publicaciones where IDmascota = '".$idMas."' order by IDpublicacion desc limit 1";
	$idPubli = query($consulta)->fetch_assoc();;

	if($_FILES['imagen']['error'] == UPLOAD_ERR_NO_FILE){
		$target_path = "assets/pets-images/".$idMas;
		actualizaFotoPublicacion( $target_path, $idPubli["IDpublicacion"] );
	}
	else{
		$target_path = "assets/publicaciones-images/".$idPubli["IDpublicacion"];
		move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path);
		actualizaFotoPublicacion( $target_path, $idPubli["IDpublicacion"] );
	}
	
	closeDB();
	
	header('Location: ./index.html?id='.$idMas.'&p=0');
				
?>