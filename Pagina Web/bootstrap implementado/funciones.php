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
		$consulta = "select IDpublicacion from publicaciones WHERE IDmascota = '".$idMascota."' order by IDpublicacion desc limit 100";
		//$publicaciones = getPublicacionesMascota($idMascota);
		$publicaciones = query($consulta);
		$i = 0;
		while($i < $publicaciones->num_rows){
			$row = $publicaciones->fetch_assoc();
			$p = getInfoPublicacion($row["IDpublicacion"])->fetch_assoc();
			echo '<li class="media">';
			   	echo '<div class="media-left">';
      				echo '<a data-toggle="modal" data-target="#ventanaImagen'.$row["IDpublicacion"].'">';
        				echo'<img class="media-object img-rounded" width="100" height="100" src="'.$p["Imagen"].'" alt="foto publicacion">';
      				echo '</a>';
    			echo '</div>';
				echo '<div class="media-body">';
					echo '<p class="info-list-cont">'.$p["Descripcion"].'';
					echo '<button class="pull-right btn btn-md glyphicon glyphicon-trash" onclick="borrarPublicacion('.$idMascota.', '.$row["IDpublicacion"].')">';
				echo '</div>';
			echo '<li>';

			echo '<div id="ventanaImagen'.$row["IDpublicacion"].'" class="modal fade" role="dialog">';
				echo '<div class="modal-dialog">';
					echo '<div class="modal-content">';
						echo '<div class="modal-body">';
							echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
							echo '<img class="media-object img-rounded" width="500" height="400" src="'.$p["Imagen"].'" alt="posts"></img>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

			$i++;
		}
	}

	// Esta funcion requiere haber abierto la BBDD
	function cargaPostUsuario( $idUsuario ){
		$infoUsu = getInfoUsuario($idUsuario)->fetch_assoc();
		$consulta = 'select * from posts where IDusuario = "'.$idUsuario.'" order by IDpost desc limit 100';
		$posts = query($consulta);
		$i = 0;

		while($i < $posts->num_rows){
			$row = $posts->fetch_assoc();

			$p = getInfoPost($row["IDpost"])->fetch_assoc();
			echo '<li class="media">';
			    echo '<div class="media-left">'; 
					echo '<a href="info.html?masc=false&id='.$idUsuario.'"> 
							<img class="media-object img-rounded" width="100" height="100" src="'.$infoUsu["Imagen"].'" alt="foto perfil">
						  </a>';
				echo '</div>';
				echo '<div class="media-body">'; 
						if(strlen( $p["Descripcion"]) > 200){
							echo '<p class="media-heading"><h4><span href="#" onclick="cargaPostCentro('.$infoUsu["IDusuario"].','.$p["IDpost"].')"'.$p["Titulo"].'</span>'.$p["Titulo"].'</h4><br>';
							echo substr ( $p["Descripcion"], 0, 200).'...<a href="#" onclick="cargaPostCentro('.$idUsuario.','.$row["IDpost"].')">Ver más</a></p>';
						}else{
							echo '<p class="media-heading"><h4><span href="#" onclick="cargaPostCentro('.$infoUsu["IDusuario"].','.$p["IDpost"].')"'.$p["Titulo"].'</span>'.$p["Titulo"].'</h4><br>';
							echo $p["Descripcion"].'</p>';
						
						}
					echo '<button class="pull-right btn btn-md glyphicon glyphicon-trash" onclick="borrarPost('.$row["IDpost"].')"></button>';
				echo '</div>'; 
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
				//ho '<a id="publicar-post"  class="boton-grand botonNaranja" href="inicioConLoginEsp_Post_Publicar.html">Publicar Post</a>';
				//primera imagen de mi posts (foto de perfil)
				$num = 0;
				echo '<button class="btn btn-default" onclick="cambioMascota(0,1)">Mis Posts</button>';
			}
			$mascotas = getMascotasUsuario($idUsuario);
			$i=0;
			while( $i < $mascotas->num_rows && $i < 4){
				$row = $mascotas->fetch_assoc();
				$infoMascota = getInfoMascota($row["IDmascota"])->fetch_assoc();
				
				echo '<button class="btn btn-default" onclick="cambioMascota('.$infoMascota["IDmascota"].',0)">'.$infoMascota["Nombre"].'</button>';
				$i++;
			}
			echo '<a href="registro.html?pr=false" class="btn btn-default pull-right" role="button">+</a>';
		}
		echo '</div>';	
	}

	function cargaPost($id, $idPost){
		header('Location: ./index.html?dir=true&id=' + $id + '&np=' + $idPost);
	}

	function cargaIndex(){
		header('Location: ./index.html');
	}

	function securePass($id, $pass){
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

	function getRandomCode($tam){
	    $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-)(.:,;";
	    $su = strlen($an) - 1;
	    $code = substr($an, rand(0, $su), 1);
	    for($i=1; $i<$tam; $i++)
	    	$code .=  substr($an, rand(0, $su), 1);
	    return $code;
	}
?>