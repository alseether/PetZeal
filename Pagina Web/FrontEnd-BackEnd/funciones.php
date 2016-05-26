 <?php
	function debug_to_console( $data ) {

	    if ( is_array( $data ) )
	        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
	    else
	        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

	    echo $output;
	}

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
?>