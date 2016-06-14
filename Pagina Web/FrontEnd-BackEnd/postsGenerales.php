<?php
	// realiza consulta a la BBDD de los post existentes
	include_once('scriptsBBDD.php');
	include_once('funciones.php');
	startDB();
	$consulta = "select * from posts order by IDpost desc limit 20";
	$ultimosPost = query($consulta);

	echo '<div class="col-phone-12 col-desktop-3 col-tablet-12">';				
		echo '<div class="cabecera"> Posts</div>';
		echo '<ul class="listado">';
		if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){

			for ($i = 0; $i < $ultimosPost->num_rows; $i++) {
				$row = $ultimosPost->fetch_assoc();
				$infoUsuario = getInfoUsuario($row["IDusuario"]);
				$rowUsu = $infoUsuario->fetch_assoc();
		    	echo '<li>';
		    		// AQUI FALTA PONER LAS URLs CORRECTAS A LAS QUE LLEVEN
					echo '<a href="info.html?masc=false&id='.$row["IDusuario"].'"> <img src="'.$rowUsu["Imagen"].'" alt="foto usuario"></a>';
					echo '<a href="lectura_post_SinLogin.html"><p class="info-list-cont">'.$rowUsu["Nick"].'<br>';
						    echo ''.$row["Titulo"].'<br>';
						    echo ''.$row["Descripcion"].'</p></a>';	

				echo '</li>';	
			}	 
		}else{//no loguedo
				for ($i = 0; $i < $ultimosPost->num_rows; $i++) {
					$row = $ultimosPost->fetch_assoc();
					$infoUsuario = getInfoUsuario($row["IDusuario"]);
					$rowUsu = $infoUsuario->fetch_assoc();
			    	echo '<li>';
			    		// AQUI FALTA PONER LAS URLs CORRECTAS A LAS QUE LLEVEN
						echo '<a href="info.html?masc=false&id='.$row["IDusuario"].'"> <img src="'.$rowUsu["Imagen"].'" alt="foto usuario"></a>';
						echo '<a href="lectura_post_SinLogin.html"><p class="info-list-cont">'.$rowUsu["Nick"].'<br>';
							    echo ''.$row["Titulo"].'<br>';
							    echo ''.$row["Descripcion"].'</p></a>';	

					echo '</li>';
				}			

		}
		echo '</ul>';
	echo '</div>';

	closeDB();
?>