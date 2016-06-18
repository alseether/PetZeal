 <?php
 	include_once('scriptsBBDD.php');
 	include_once('funciones.php');
 	startDB();
 	
 	
 	$descripcion= $_REQUEST["descripcion"];
 	$titulo = $_REQUEST["titulo"];
 	$fecha = date("Y")."-".date("m")."-".date("d");


	// insertaNuevoPost($titulo, $fecha, $descripcion, $et1, $et2, $et3, $et4, $et5, $likes, $idUsuario){
	insertaNuevoPost($titulo, $fecha, $descripcion, 0, 0, 0, 0, 0, 0, $_COOKIE["idUsu"]);
	
	//$consulta = "select IDpublicacion from publicaciones where IDmascota = '".$idMas."' order by IDpublicacion desc limit 1";
	//$idPubli = query($consulta)->fetch_assoc();

	
	closeDB();
	
	header('Location: ./index.html');
				
?>