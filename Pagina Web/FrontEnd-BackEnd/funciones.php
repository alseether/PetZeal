 <?php
	function debug_to_console( $data ) {

	    if ( is_array( $data ) )
	        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
	    else
	        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

	    echo $output;
	}


	// Esta funcion requiere haber abierto la BBDD
	function cargaPublicacionesMascota( $idMascota ){
		$publicaciones = getPublicacionesMascota($idMascota);
		$i = 0;
		while($i < $publicaciones->num_rows && $i < 5){
			$row = $publicaciones->fetch_assoc();
			$p = getInfoPublicacion($row["IDpublicacion"])->fetch_assoc();
			echo '<li class="media">';
			   	echo '<div class="media-left">';
      				echo '<a href="info.html?masc=true&id='.$idMascota.'">';
        				echo'<img class="media-object img-rounded" width="100" height="100" src="'.$p["Imagen"].'" alt="foto publicacion">';
      				echo '</a>';
    			echo '</div>';
				echo '<div class="media-body">';
					echo '<p class="info-list-cont">'.$p["Descripcion"].'';
					echo '<input type="button" class="pull-right btn btn-md glyphicon glyphicon-trash" onclick="borrarPublicacion('.$idMascota.', '.$row["IDpublicacion"].')" src="assets/images/borrar.png" class="botonBorrar">';
				echo '</div>';
			echo '<li>';
			$i++;
		}
	}

	// Esta funcion requiere haber abierto la BBDD
	function cargaPostUsuario( $idUsuario ){
		$infoUsu = getInfoUsuario($idUsuario)->fetch_assoc();
		$consulta = 'select * from posts where IDusuario = "'.$idUsuario.'" order by IDpost desc limit 20';
		$posts = query($consulta);
		$i = 0;

		while($i < $posts->num_rows && $i < 5){
			$row = $posts->fetch_assoc();

			$p = getInfoPost($row["IDpost"])->fetch_assoc();
			echo '<li>';
				echo '<a href="info.html?masc=false&id='.$idUsuario.'"> <img src="'.$infoUsu["Imagen"].'" alt="foto perfil"></a>';
				echo '<p class="info-list-cont">'.$p["Titulo"].'<br>'.$p["Descripcion"].'</p>';
				echo '<input type="button" onclick="borrarPost('.$row["IDpost"].')" src="assets/images/borrar.png" class="botonBorrar">';
			echo '<li>'; 
			$i++;
		}
//eliminaPost($row["IDpost"]);
	}

	// Esta funcion requiere haber abierto la BBDD
	function cargaCarrusel( $idUsuario ){
		$infoUsu = getInfoUsuario($idUsuario)->fetch_assoc();
		echo '<div class="lista-mascotas">';
		if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
			if(isset($_COOKIE["rol"]) && $_COOKIE["rol"] == "Premium"){
				echo '<a id="publicar-post"  class="boton-grand botonNaranja" href="inicioConLoginEsp_Post_Publicar.html">Publicar Post</a>';
				//primera imagen de mi posts (foto de perfil)
				$num = 0;
				echo '<button onclick="cambioMascota(0,1)"> <img src="'.$infoUsu["Imagen"].'" alt="foto perfil"></button>';
			}
			$mascotas = getMascotasUsuario($idUsuario);
			$i=0;
			while( $i < $mascotas->num_rows && $i < 4){
				$row = $mascotas->fetch_assoc();
				$infoMascota = getInfoMascota($row["IDmascota"])->fetch_assoc();
				
				echo '<button class="btn btn-default" onclick="cambioMascota('.$infoMascota["IDmascota"].',0)">$row["Nombre"]</button>';
				$i++;
			}
			echo '<a href="altaMascota.html" class="btn btn-default pull-right" role="button">+</a>';
		}
		echo '</div>';	
	}



?>