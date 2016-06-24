 <?php
 	include_once('scriptsBBDD.php');
 	include_once('funciones.php');
 	startDB();
 	
 	
 	$descripcion= $_REQUEST["descripcion"];
 	$titulo = $_REQUEST["titulo"];
 	$fecha = date("Y")."-".date("m")."-".date("d");

 	$etiquetas = explode(" ", $_REQUEST["etiquetas"]);//String a array separandolo segun el caracter
 	$numEtiquetas = count($etiquetas);
 	$id1 = 0;
 	$id2 = 0;
 	$id3 = 0;
 	$id4 = 0;
 	$id5 = 0;
 	if($numEtiquetas > 0){
	 	$etiqueta1 = str_split($etiquetas[0]);//String a array de caracteres
	 	unset($etiqueta1[0]);
	 	$id1 = getIdEtiqueta(implode($etiqueta1));
	 	if($id1->num_rows == 0){
	 		insertaNuevaEtiqueta(implode($etiqueta1), 0);
	 		$id1 = getIdEtiqueta(implode($etiqueta1));
	 	}
	 	$id1 = $id1->fetch_assoc();
	 	$id1 = $id1["IDetiqueta"];
	 	$numEtiquetas--;
 	}
 	if($numEtiquetas > 0){
	 	$etiqueta2 = str_split($etiquetas[1]);//String a array de caracteres
	 	unset($etiqueta2[0]);
	 	$id2 = getIdEtiqueta(implode($etiqueta2));
	 	if($id2->num_rows == 0){
	 		insertaNuevaEtiqueta(implode($etiqueta2), 0);
	 		$id2 = getIdEtiqueta(implode($etiqueta2));
	 	}
		$id2 = $id2->fetch_assoc();
 		$id2 = $id2["IDetiqueta"];
	 	$numEtiquetas--;
 	}
 	if($numEtiquetas > 0){
	 	$etiqueta3 = str_split($etiquetas[2]);//String a array de caracteres
	 	unset($etiqueta3[0]);
	 	$id3 = getIdEtiqueta(implode($etiqueta3));
	 	if($id3->num_rows == 0){
	 		insertaNuevaEtiqueta(implode($etiqueta3), 0);
	 		$id3 = getIdEtiqueta(implode($etiqueta3));
	 	}
	 	$id3 = $id3->fetch_assoc();
	 	$id3 = $id3["IDetiqueta"];
	 	$numEtiquetas--;
 	}
 	if($numEtiquetas > 0){
	 	$etiqueta4 = str_split($etiquetas[3]);//String a array de caracteres
	 	unset($etiqueta4[0]);
	 	$id4 = getIdEtiqueta(implode($etiqueta4));
	 	if($id4->num_rows == 0){
	 		insertaNuevaEtiqueta(implode($etiqueta4), 0);
	 		$id4 = getIdEtiqueta(implode($etiqueta4));
	 	}
	 	$id4 = $id4->fetch_assoc();
	 	$id4 = $id4["IDetiqueta"];
	 	$numEtiquetas--;
 	}
 	if($numEtiquetas > 0){
	 	$etiqueta5 = str_split($etiquetas[4]);//String a array de caracteres
	 	unset($etiqueta5[0]);
	 	$id5 = getIdEtiqueta(implode($etiqueta5));
	 	if($id5->num_rows == 0){
	 		insertaNuevaEtiqueta(implode($etiqueta5), 0);
	 		$id5 = getIdEtiqueta(implode($etiqueta5));
	 	}
	 	$id5 = $id5->fetch_assoc();
	 	$id5 = $id5["IDetiqueta"];
	 	$numEtiquetas--;
 	}

	// insertaNuevoPost($titulo, $fecha, $descripcion, $et1, $et2, $et3, $et4, $et5, $likes, $idUsuario){
	insertaNuevoPost($titulo, $fecha, $descripcion, $id1, $id2, $id3, $id4, $id5, 0, $_COOKIE["idUsu"]);
	
	//$consulta = "select IDpublicacion from publicaciones where IDmascota = '".$idMas."' order by IDpublicacion desc limit 1";
	//$idPubli = query($consulta)->fetch_assoc();

	
	closeDB();
	
	header('Location: ./index.html?id='.$_COOKIE["idUsu"].'&p=1');
				
?>