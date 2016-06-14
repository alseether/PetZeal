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
			echo '<li>';
				echo '<a href="infoMascota_Usu.html"> <img src="'.$p["Imagen"].'" alt="foto publicacion"></a>';
				echo '<p class="info-list-cont">'.$p["Descripcion"].'';
				echo '<input type="button"  onclick="cambioMascota('.$idMascota.',0,0,'.$row["IDpublicacion"].')" src="assets/images/borrar.png" class="botonBorrar">';
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
				echo '<a href="infoMascota_Usu.html"> <img src="'.$infoUsu["Imagen"].'" alt="foto perfil"></a>';
				echo '<p class="info-list-cont">'.$p["Titulo"].'<br>'.$p["Descripcion"].'</p>';
				echo '<input type="button" onclick="cambioMascota(0,1,'.$row["IDpost"].',0)" src="assets/images/borrar.png" class="botonBorrar">';
			echo '<li>'; 
			$i++;
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
				$num = 0;
				echo '<button onclick="cambioMascota(0,1,0,0)"> <img src="'.$infoUsu["Imagen"].'" alt="foto perfil"></button>';
			}
			$mascotas = getMascotasUsuario($idUsuario);
			$i=0;
			while( $i < $mascotas->num_rows && $i < 4){
				$row = $mascotas->fetch_assoc();
				$infoMascota = getInfoMascota($row["IDmascota"])->fetch_assoc();
				
				echo '<button onclick="cambioMascota('.$infoMascota["IDmascota"].',0,0,0)"> <img src='.$infoMascota["Imagen"].' data-idMascota = '.$infoMascota["IDmascota"].' alt="'.$infoMascota["Nombre"].'"></button>';
				$i++;
			}
			echo '<a href="altaMascota.html">	<img id ="anadir" src="assets/images/anadir-mascota.jpg" alt="añadir"></a>';
		}
		echo '</div>';	
	}


	function subirPublicacion( $foto){
		insertaNuevaPublicacion(2, 3,$foto , 4, 5);
		cambioMascota(0,1,0,0);
	}

?>