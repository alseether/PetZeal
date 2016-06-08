<?php
	// realiza consulta a la BBDD de los post existentes
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$busqueda = $_GET["search"]; 
	//debug_to_console($busqueda);
	//$array = str_split($busqueda);
	$array = explode(" ", $busqueda);//String a array separandolo segun el caracter 
	$numPalabras = count($array); //Cuenta numero de elementos de un array
	$search = str_split($array[0]);//String a array de caracteres
	//implode($search) Array a string
	$encontrado = false;
	//echo "search es $busqueda";
	echo '<div class="col-phone-12 col-desktop-9 col-tablet-12">';
	echo '<div class="cabecera"> Busqueda: "'.$busqueda.'"</div>';
	echo '<ul class="listado">';
	if($search[0] == '@'){
		unset($search[0]);
		$consulta = "select IDusuario from usuarios";
		$usuarios = query($consulta);				
		for ($i = 0; $i < $usuarios->num_rows; $i++) {
			$row = $usuarios->fetch_assoc();
			$idMasc = getIdMascota(implode($search), $row["IDusuario"])->fetch_assoc();
			$mascota = getInfoMascota($idMasc["IDmascota"])->fetch_assoc();
			if($mascota != NULL){
				if($encontrado == false)
					echo '<h1>Mascotas encontradas:</h1>';
				$encontrado = true;
				echo '<li>';
					echo '<a href="info.html?masc=true&id='.$idMasc["IDmascota"].'"> <img src="'.$mascota["Imagen"].'" alt="foto mascota"></a>';
		   			echo '<a href="info.html?masc=true&id='.$idMasc["IDmascota"].'">'.implode($search).'</a>';
				echo '</li>';
			}
		} 
		$idUsu = getIdUsuario(implode($search))->fetch_assoc();
		$usu = getInfoUsuario($idUsu["IDusuario"])->fetch_assoc();
		if($usu != NULL){
			echo '<h1>Usuarios encontrados:</h1>';
			$encontrado = true;
			echo '<li>';
				echo '<a href="info.html?masc=false&id='.$usu["IDusuario"].'"> <img src="'.$usu["Imagen"].'" alt="foto usuario"></a>';
				echo '<a href="info.html?masc=false&id='.$usu["IDusuario"].'">'.implode($search).'</a>';
			echo '</li>';
		}
	}
	else {
		if($search[0] == '$')
			$posts = buscaEtiquetas($array, $numPalabras);
		else
			$posts = buscaPalabras($array, $numPalabras);

		for ($i = 0; $i < $posts->num_rows; $i++) {
			if($encontrado == false)
				echo '<h1>Post encontrados:</h1>';
			$encontrado = true;
			$row = $posts->fetch_assoc();
			$idUsu = getInfoUsuario($row["IDusuario"])->fetch_assoc();
			echo '<li>';
				echo '<a href="info.html?masc=false&id='.$idUsu["IDusuario"].'"> <img src="'.$idUsu["Imagen"].'" alt="foto usuario"></a>';
				echo '<a href="lectura.html?id='.$row["IDpost"].'"><p class="info-list-cont">'.$idUsu["Nick"].'<br>';
				    echo ''.$row["Titulo"].'<br>';
				    echo ''.$row["Descripcion"].'</p></a>';	
			echo '</li>';
		}
	}

	if($encontrado == false)
		echo '<h1>No hay resultados</h1>';
	echo '</ul>';
	echo '</div>';
	closeDB();
?>