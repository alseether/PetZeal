<?php
	include_once("funciones.php");
	include_once("scriptsBBDD.php");
	echo '<div id="cabecera" class="page-header col-lg-12 col-md-12 col-sm-12" style="background-color:006633;" >';
		echo '<div class="col-lg-3 col-md-4 col-sm-3 col-xs-12">';
	        echo '<a href="index.html" style="background-color:006633;">';
	        	echo '<img alt="PetZeal" id="imagenLogo" src="assets/images/logoPetZeal.png">';
	    	echo '</a>';
	    echo '</div>';
		echo '<div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">';
	        echo '<form id="buscadorHeader" class="input-group" action="busqueda.html">';
	            echo '<input type="text" name="search" class="form-control" placeholder="Buscar: Post - @usuario - @mascota - $etiqueta">';
	            echo '<span class="input-group-btn">';
	               echo '<button class="btn btn-default" type="submit">';
	               echo '<div class="glyphicon glyphicon-search" style="height:20px"></div>';
	               echo '</button>';
	            echo '</span>';
        	echo '</form>';
     	echo '</div>';
		startDB();
		echo '<div id="botonesHeader" class="col-lg-3 col-md-3 col-sm-3">';
			if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
				echo '<a href="mensajeria.html" class="btn btn-default glyphicon glyphicon-envelope btn-md col-lg-2 col-md-2 col-sm-2 botonMensajeria" role="button"></a>';
			}
			if(isset($_COOKIE["log"]) && $_COOKIE["log"] == true){
				echo '<div class="col-lg-3 col-md-3 col-sm-3"></div>';
		        echo '<a href="info.html?masc=false&id='.$_COOKIE["idUsu"].'" id="botonHeader" class="btn btn-success btn-md col-lg-7 col-md-7 col-sm-7" role="button">Mi perfil</a>';
		        echo '<div class="col-lg-3 col-md-3 col-sm-3"></div>';
		        echo '<a href="logout.php" id="botonHeader" class="btn btn-default btn-md col-lg-7 col-md-7 col-sm-7" role="button">Desconectarse</a>';
			}
			else{
				echo '<div class="col-lg-3 col-md-3 col-sm-3"></div>';
		        echo '<button id="botonHeader" type="button" class="btn btn-default btn-md col-lg-7 col-md-8 col-sm-10" data-toggle="modal" data-target="#ventanaLogin" onclick="viewBox()">Iniciar sesión</button>';
		        echo '<div class="col-lg-3 col-md-3 col-sm-3"></div>';
		        echo '<a id="botonHeader" href="registro.html?pr=false" type="button" class="btn btn-default btn-md col-lg-7 col-md-8 col-sm-10" role="button">Registrarse</a>';
			}		
		echo '</div>';
	echo '</div>';
	
	if(!isset($_COOKIE["log"]) || $_COOKIE["log"] == false){
		echo '<div id="ventanaLogin" class="modal fade" role="dialog">';
			echo '<div class="modal-dialog">';
				echo '<div class="modal-content">';
					echo '<div class="modal-header">';
						echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
						echo '<h2 class="modal-title">Iniciar sesión</h2>';
					echo '</div>';
					echo '<div class="modal-body">';
						echo '<form class="form-horizontal" method=post action="login.php" role="form">';
							echo '<div class="form-group">';
								echo '<label class="control-label col-sm-2" for="text">Usuario:</label>';
								echo '<div class="col-sm-10">';
									echo '<input type="text" class="form-control" id="text" name="usuario" placeholder="Introduzca nombre de usuario">';
								echo '</div>';
							echo '</div>';
							echo '<div class="form-group">';
								echo '<label class="control-label col-sm-2" for="pwd">Contraseña:</label>';
								echo '<div class="col-sm-10"> ';
									echo '<input type="password" class="form-control" id="pwd" name="passwd" placeholder="Introduzca contraseña">';
								echo '</div>';
							echo '</div>';
							echo '<div class="form-group"> ';
								echo '<div class="col-sm-offset-2 col-sm-10">';
									echo '<button type="submit" class="btn btn-default">Entrar</a>';
								echo '</div>';
							echo '</div>';
						echo '</form>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}
	closeDB();
?>