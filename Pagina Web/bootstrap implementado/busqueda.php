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
	echo '<div class="panel panel-default col-lg-9 col-md-11 col-sm-11">';
		echo '<div class="panel-heading"><h2>Búsqueda por: "'.$busqueda.'"</h2></div>';
		echo '<div id="panelPosts-mascota" class="panel-body">';
			echo '<ul class="media-list">';
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
						echo '<li class="media">';
							echo '<div class="media-left">';
								echo '<a href="info.html?masc=true&id='.$idMasc["IDmascota"].'"> <img class="media-object img-rounded" width="100" height="100" src="'.$mascota["Imagen"].'" alt="foto mascota"></a>';
				   			echo '</div>';
				   			echo '<div class="media-body">';
				   				echo '<a class="media-heading" href="info.html?masc=true&id='.$idMasc["IDmascota"].'">';
				   					echo '<h2>@'.implode($search).'</h2>';
				   				echo'</a>';
							echo '</div>';
						echo '</li>';
					}
				} 
				$idUsu = getIdUsuario(implode($search))->fetch_assoc();
				$usu = getInfoUsuario($idUsu["IDusuario"])->fetch_assoc();
				if($usu != NULL && $usu["Rol"]=="Premium"){
					echo '<h1>Usuarios encontrados:</h1>';
					$encontrado = true;
					echo '<li class="media">';
						echo '<div class="media-left">';
							echo '<a href="info.html?masc=false&id='.$usu["IDusuario"].'"> <img class="media-object img-rounded" width="100" height="100" src="'.$usu["Imagen"].'" alt="foto usuario"></a>';
						echo '</div>';
				   		echo '<div class="media-body">';
							echo '<a href="info.html?masc=false&id='.$usu["IDusuario"].'">';
								echo'<h2 class="media-heading">@'.implode($search).'</h2>';
							echo '</a>';
						echo '</div>';
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
					echo '<li class="media">';
						echo '<div class="media-left">';
							echo '<a href="info.html?masc=false&id='.$idUsu["IDusuario"].'"> <img class="media-object img-rounded" width="100" height="100" src="'.$idUsu["Imagen"].'" alt="foto usuario"></a>';
						echo '</div>';
				   		echo '<div class="media-body">';
							echo '<a href="index.html?dir=true&id='.$idUsu["IDusuario"].'&np='.$row["IDpost"].'">';	// Corregir esta llamada, debe ser a index, con los parametros adecuados
								echo '<h2>'.$row["Titulo"].'</h2>';
								echo '<h4 class="media-heading">@'.$idUsu["Nick"].'</h4>';
							echo '</a>';
						echo '</div>';
					echo '</li>';
				}
			}

			if($encontrado == false)
				echo '<h1>No hay resultados</h1>';
			echo '</ul>';
		echo '</div>';
	echo '</div>';
	closeDB();
?>