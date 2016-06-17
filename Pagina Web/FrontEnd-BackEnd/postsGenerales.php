 <?php
	// realiza consulta a la BBDD de los post existentes
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$consulta = "select * from posts order by IDpost desc limit 20";
	$ultimosPost = query($consulta);

	echo '<div class="div-cuerpo col-lg-12 col-md-12 col-sm-12">';
		echo '<div class="panel panel-default col-lg-3 col-md-12 col-sm-12">';
			echo '<div class="panel-heading"><h2>Posts</h2></div>';
			echo '<div id="panelPosts" class="panel-body">';
			echo '<ul class="media-list>';
			if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){

				for ($i = 0; $i < $ultimosPost->num_rows; $i++) {
					$row = $ultimosPost->fetch_assoc();
					$infoUsuario = getInfoUsuario($row["IDusuario"]);
					$rowUsu = $infoUsuario->fetch_assoc();
			    	echo '<li class="media">';
			    		// AQUI FALTA PONER LAS URLs CORRECTAS A LAS QUE LLEVEN
						echo '<div class="media-left">';
							echo '<a href="info.html?masc=false&id='.$row["IDusuario"].'"> <img class="media-object img-thumbnail" width="100" height="100" src="'.$rowUsu["Imagen"].'" alt="foto usuario"></a>';
						echo '</div>';
						echo '<div class="media-body">';
							echo '<a type="button" class="media-body" onclick="cargaPostCentro('.$row["IDusuario"].','.$row["IDpost"].')"><p class="info-list-cont">';
							    echo '<h4 class="media-heading">'.$row["Titulo"].'</h4>';
							    echo '<p>'.$row["Descripcion"].'</p></a>';	
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
					    		// AQUI FALTA PONER LAS URLs CORRECTAS A LAS QUE LLEVEN
								echo '<a href="info.html?masc=false&id='.$row["IDusuario"].'"> <img class="media-object img-thumbnail" width="100" height="100" src="'.$rowUsu["Imagen"].'" alt="foto usuario"></a>';
							echo '</div>';
								echo '<div class="media-body">';
								echo '<a type="button" class="media-body" onclick="cargaPostCentro('.$row["IDusuario"].','.$row["IDpost"].')"><p class="info-list-cont">'.$rowUsu["Nick"].'<br>';
									    echo '<h4 class="media-heading">'.$row["Titulo"].'</h4>';
									    echo '<p>'.$row["Descripcion"].'</p></a>';	
								echo '</div>';
						echo '</li>';
					}			

			}
			echo '</ul>';
			echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';

	closeDB();
?>