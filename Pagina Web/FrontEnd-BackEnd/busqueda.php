<?php
	// realiza consulta a la BBDD de los post existentes
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$busqueda = $_GET["search"];
	$array = str_split($busqueda);
	$len = mb_strlen($busqueda, "UTF-8");
	echo "search es $busqueda";
	if($array[0] == '@'){
		unset($array[0]);
		$idUsu = getIdUsuario(implode($array))->fetch_assoc();
		$usu = getInfoUsuario($idUsu["IDusuario"])->fetch_assoc();
		echo '<div class="col-phone-12 col-desktop-9 col-tablet-12">';
		echo '<div class="cabecera"> Busqueda: '.$busqueda.'</div>';
			echo '<ul class="listado">';
				if($usu != NULL){
					echo '<a href="info.html?masc=true&id='.$usu["IDusuario"].'"> <img src="'.$usu["Imagen"].'" alt="foto usuario"></a>';
					echo '<a href="info.html?masc=false&id='.$usu["IDusuario"].'">'.$busqueda.'</a>';
				}
				else
					echo '<h1>No se encuentra el usuario</h1>';
			echo '</ul>';
		echo '</div>';
	}
	else if($array[0] == '$'){
		echo '<h1>Busqueda de etiqueta</h1>';
	}
	else{
		$consulta = "select IDusuario from usuarios";
		$usuarios = query($consulta);
		echo '<div class="col-phone-12 col-desktop-9 col-tablet-12">';
		echo '<div class="cabecera"> Busqueda de mascotas: '.$busqueda.'</div>';
			echo '<ul class="listado">';
				$encontrada = false;		
				for ($i = 0; $i < $usuarios->num_rows; $i++) {
					$row = $usuarios->fetch_assoc();
					$idMasc = getIdMascota($busqueda, $row["IDusuario"])->fetch_assoc();
					$mascota = getInfoMascota($idMasc["IDmascota"])->fetch_assoc();
					if($mascota != NULL){
						$encontrada = true;
						echo '<li>';
							echo '<a href="info.html?masc=true&id='.$idMasc["IDmascota"].'"> <img src="'.$mascota["Imagen"].'" alt="foto mascota"></a>';
				   			echo '<a href="info.html?masc=true&id='.$idMasc["IDmascota"].'">'.$busqueda.'</a>';
						echo '</li>';
					}
				} 
				if($encontrada == false)
					echo '<h1>No existen mascotas con ese nombre</h1>';
			echo '</ul>';
		echo '</div>';
	}
	/*$consulta = "select * from posts order by IDpost desc limit 20";
	$ultimosPost = query($consulta);

	echo '<div class="col-phone-12 col-desktop-3 col-tablet-12">';
		echo '<div class="cabecera"> Posts</div>';
		echo '<ul class="listado">';
					
			for ($i = 0; $i < $ultimosPost->num_rows; $i++) {
				$row = $ultimosPost->fetch_assoc();
				$infoUsuario = getInfoUsuario($row["IDusuario"]);
				$rowUsu = $infoUsuario->fetch_assoc();
		    	echo '<li>';
		    		// AQUI FALTA PONER LAS URLs CORRECTAS A LAS QUE LLEVEN
					echo '<a href="infoEspecialista_Otro_SinLogin.html"> <img src="'.$rowUsu["Imagen"].'" alt="foto usuario"></a>';
					echo '<a href="lectura_post_SinLogin.html"><p class="info-list-cont">'.$rowUsu["Nick"].'<br>';
						    echo ''.$row["Titulo"].'<br>';
						    echo ''.$row["Descripcion"].'</p></a>';	

				echo '</li>';
			} 
		echo '</ul>';
	echo '</div>';
*/
	closeDB();
?>