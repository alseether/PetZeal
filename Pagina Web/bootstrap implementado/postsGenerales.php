 <?php
	// realiza consulta a la BBDD de los post existentes
	include_once('scriptsBBDD.php');
	include_once('funciones.php');

	startDB();
	$consulta = "select * from posts order by IDpost desc limit 20";
	$ultimosPost = query($consulta);

		echo '<div class="panel panel-default col-lg-3 col-md-11 col-sm-11">';
			echo '<div class="panel-heading"><h2>Posts</h2></div>';
			echo '<div class="panelPostsOK panel-body">';
			echo '<ul class="media-list>';
			if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){

				for ($i = 0; $i < $ultimosPost->num_rows; $i++) {
					$row = $ultimosPost->fetch_assoc();
					$infoUsuario = getInfoUsuario($row["IDusuario"]);
					$rowUsu = $infoUsuario->fetch_assoc();
			    	echo '<li class="media">';
			    		
						echo '<div class="media-left">';
							echo '<a href="info.html?masc=false&id='.$row["IDusuario"].'"> <img class="media-object img-thumbnail" width="100" height="100" src="'.$rowUsu["Imagen"].'" alt="foto usuario"></a>';
						echo '</div>';
						echo '<div class="media-body">';
							echo '<span type="button" class="media-body" onclick="cargaPostCentro('.$row["IDusuario"].','.$row["IDpost"].')"><p class="info-list-cont">';
							    echo '<a id="link" href="#" ><h4 class="media-heading">'.$row["Titulo"].'</h4></a>';
							    if(strlen( $row["Descripcion"]) > 60){
							    	echo ''.substr ( $row["Descripcion"], 0, 60).'<a style="text-decoration:none" href="#">Ver más</a>';
							    }else{
							    	echo '<p>'.$row["Descripcion"].'</p></span>';
							    }
						echo '</div>';
					echo '</li>';	
				}	 
			}else{//no loguedo
					for ($i = 0; $i < $ultimosPost->num_rows; $i++) {
						$row = $ultimosPost->fetch_assoc();
						$infoUsuario = getInfoUsuario($row["IDusuario"]);
						$rowUsu = $infoUsuario->fetch_assoc();
				    	echo '<li class="media">';
					    	echo '<div class="media-left">';
					    		
								echo '<a href="info.html?masc=false&id='.$row["IDusuario"].'"> <img class="media-object img-thumbnail" width="100" height="100" src="'.$rowUsu["Imagen"].'" alt="foto usuario"></a>';
							echo '</div>';
								echo '<div class="media-body">';
								echo '<span type="button" class="media-body" onclick="cargaPostCentro('.$row["IDusuario"].','.$row["IDpost"].')"><p class="info-list-cont">';
									echo '<a href="#" id="link"> <h4 class=" media-heading">'.$row["Titulo"].'</h4></a>';
									if(strlen( $row["Descripcion"]) > 60){
							    	echo ''.substr ( $row["Descripcion"], 0, 60).'<a href="#">Ver más</a>';
								    }else{
								    	echo '<p>'.$row["Descripcion"].'</p></span>';
								    }   
								echo '</div>';
						echo '</li>';
					}			

			}
			echo '</ul>';
			echo '</div>';
			echo '</div>';
		echo '</div>';


	closeDB();
?>