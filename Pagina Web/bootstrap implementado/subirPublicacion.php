 <?php
 	include_once('scriptsBBDD.php');
 	include_once('funciones.php');
 	startDB();
 	
 	$idMas = $_REQUEST["id"];
 	$descripcion= $_REQUEST["descripcion"];

	insertaNuevaPublicacion($descripcion, 0, "", 0, $idMas);
	
	$consulta = "select IDpublicacion from publicaciones where IDmascota = '".$idMas."' order by IDpublicacion desc limit 1";
	$idPubli = query($consulta)->fetch_assoc();;



	$target_path = "assets/publicaciones-images/".$idPubli["IDpublicacion"];
	move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path);
	actualizaFotoPublicacion( $target_path, $idPubli["IDpublicacion"] );
	
	closeDB();
	
	header('Location: ./index.html');
				
?>