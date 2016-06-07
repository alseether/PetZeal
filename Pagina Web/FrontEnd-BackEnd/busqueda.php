<?php
	// realiza consulta a la BBDD de los post existentes
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$busqueda = $_GET["search"]; 
	//debug_to_console($busqueda);
	//$array = str_split($busqueda);
	$array = explode(" ", $busqueda);
	$numPalabras = count($array);
	$search = str_split($array[0]);
	//echo "search es $busqueda";
	echo '<div class="col-phone-12 col-desktop-9 col-tablet-12">';
	echo '<div class="cabecera"> Busqueda de: '.$busqueda.'</div>';
	if($search[0] == '@'){
		unset($search[0]);
		$consulta = "select IDusuario from usuarios";
		$usuarios = query($consulta);
		echo '<ul class="listado">';	
			$encontrado = false;		
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
					echo '<a href="info.html?masc=true&id='.$usu["IDusuario"].'"> <img src="'.$usu["Imagen"].'" alt="foto usuario"></a>';
					echo '<a href="info.html?masc=false&id='.$usu["IDusuario"].'">'.implode($search).'</a>';
				echo '</li>';
			}
			if($encontrado == false)
				echo '<h1>No hay resultados</h1>';
		echo '</ul>';
	}
	else if($search[0] == '$'){
		echo '<ul class="listado">';
			echo '<h1>Busqueda de etiqueta</h1>';
		echo '</ul>';
	}
	else{
		echo '<ul class="listado">';
			echo '<h1>Busqueda de titulos</h1>';
		echo '</ul>';
	}
	echo '</div>';
	closeDB();
?>