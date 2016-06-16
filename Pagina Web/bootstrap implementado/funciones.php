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
				echo '<input type="button"  onclick='.borrarPublicacion( $row["IDpublicacion"], $idMascota).' src="assets/images/borrar.png" class="botonBorrar">';
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
				echo '<input type="button" onclick='.borrarPosts($row["IDpost"]).' src="assets/images/borrar.png" class="botonBorrar">';
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
				echo '<button onclick="cambioMascota(0,1)"> <img src="'.$infoUsu["Imagen"].'" alt="foto perfil"></button>';
			}
			$mascotas = getMascotasUsuario($idUsuario);
			$i=0;
			while( $i < $mascotas->num_rows && $i < 4){
				$row = $mascotas->fetch_assoc();
				$infoMascota = getInfoMascota($row["IDmascota"])->fetch_assoc();
				
				echo '<button onclick="cambioMascota('.$infoMascota["IDmascota"].',0)"> <img src='.$infoMascota["Imagen"].' data-idMascota = '.$infoMascota["IDmascota"].' alt="'.$infoMascota["Nombre"].'"></button>';
				$i++;
			}
			echo '<a href="altaMascota.html">	<img id ="anadir" src="assets/images/anadir-mascota.jpg" alt="añadir"></a>';
		}
		echo '</div>';	
	}

		// Esta funcion requiere haber abierto la BBDD
	function borrarPosts( $idPost){
		eliminaPost($idPost);
		//cambioMascota(0,1);

	}
	function borrarPublicacion( $IDpublicacion, $idMascota){
		eliminaPost($IDpublicacion);
		 cambioMascota($idMascota,0);

	}

	function obteinSecurePass($id, $pass){
		$salt = getSaltUsuario($id)->fetch_assoc();
		$nueva = $pass.$salt["Salt"]."idiota";
		$nueva = hash("sha256", $nueva);

		return $nueva;
	}

	function newSecurePass($id, $pass){
		$salt = getRandomCode(12);
		insertaNuevaSalt($id, $salt);
		$nueva = $pass.$salt."idiota";
		$nueva = hash("sha256", $nueva);

		return $nueva;
	}

	function updateSecurePass($id, $pass){
		$salt = getRandomCode(12);

		actualizaSalt($id, $salt);
		$nueva = $pass.$salt."idiota";
		$nueva = hash("sha256", $nueva);

		return $nueva;
	}

	function getRandomCode($tam){
	    $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-)(.:,;";
	    $su = strlen($an) - 1;
	    $code = substr($an, rand(0, $su), 1);
	    for($i=1; $i<$tam; $i++)
	    	$code .=  substr($an, rand(0, $su), 1);
	    return $code;
	}
?>