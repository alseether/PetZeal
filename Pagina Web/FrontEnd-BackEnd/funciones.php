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
		for($i = 0; $i < $publicaciones->num_rows; $i++){
			$row = $publicaciones->fetch_assoc();
			$p = getInfoPublicacion($row["IDpublicacion"])->fetch_assoc();
			echo '<li>';
				echo '<a href="infoMascota_Usu.html"> <img src="'.$p["Imagen"].'" alt="foto publicacion"></a>';
				echo '<p class="info-list-cont">'.$p["Descripcion"].'';
				echo '<input type="button" src="assets/images/borrar.png" class="botonBorrar">';
			echo '<li>';
		}
	}

	// Esta funcion requiere haber abierto la BBDD
	function cargaPostUsuario( $idUsuario ){
		$infoUsu = getInfoUsuario($idUsuario)->fetch_assoc();
		$consulta = 'select * from posts where IDusuario = "'.$idUsuario.'" order by IDpost desc limit 20';
		$posts = query($consulta);
		for($i = 0; $i < $posts->num_rows; $i++){
			$row = $posts->fetch_assoc();
			$p = getInfoPost($row["IDpost"])->fetch_assoc();
			echo '<li>';
				echo '<a href="infoMascota_Usu.html"> <img src="'.$infoUsu["Imagen"].'" alt="foto perfil"></a>';
				echo '<p class="info-list-cont">'.$p["Titulo"].'<br>'.$p["Descripcion"].'</p>';
				echo '<input type="button" src="assets/images/borrar.png" class="botonBorrar">';
			echo '<li>';
		}
	}

	// Esta funcion requiere haber abierto la BBDD
	function cargaCarrusel( $idUsuario ){
		$infoUsu = getInfoUsuario($idUsuario)->fetch_assoc();
		echo '<div class="lista-mascotas">';
		if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
			if(isset($_COOKIE["rol"]) && $_COOKIE["rol"] == "Premium"){
				echo '<a id="publicar-post"  class="boton-grand botonNaranja" href="inicioConLoginEsp_Post_Publicar.html">Publicar Post</a>';
				//primera imagen de mi posts (foto de perfil)
				echo '<a href="inicioConLoginEsp_Post.html"> <img src="'.$infoUsu["Imagen"].'" alt="foto perfil"></a>';
			}
			$mascotas = getMascotasUsuario($idUsuario);
			for($i=0; $i < $mascotas->num_rows; $i++){
				$row = $mascotas->fetch_assoc();
				$infoMascota = getInfoMascota($row["IDmascota"])->fetch_assoc();
				echo '<a href="inicioConLogin.html"> <img src='.$infoMascota["Imagen"].' data-idMascota = '.$infoMascota["IDmascota"].' alt="'.$infoMascota["Nombre"].'"></a>';
			}
			echo '<a href="altaMascota.html">	<img id ="anadir" src="assets/images/anadir-mascota.jpg" alt="añadir"></a>';
		}
		echo '</div>';	
	}
?>