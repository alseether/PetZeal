<?php
	session_start(); 
	echo '<header class = "col-desktop-12 col-tablet-12 col-phone-12" >';
		echo '<a id="logoCabecera" href="index.html"></a>';
		echo '<div id="barraBusqueda">';
			echo '<input type="text" name="Busqueda" placeholder="Buscar" id="busquedaEntrada">';
			echo '<a id="lupa" class="col-desktop-1 col-tablet-1 col-phone-1" href="buscar_post.html"></a>';
		echo '</div>';
		if(isset($_SESSION["login"]) && $_SESSION["login"]==true)
			echo '<a id="logoCorreo" href="mensajeria.html"></a>';
		echo '<div id="camposLogin" >';
			if(isset($_SESSION["login"]) && $_SESSION["login"]==true){
				echo '<div id="linea1">';
					echo '<a id="login" class="botonLogin botonNaranja" href="infoUsu.html">Mi perfil</a>';
				echo '</div>';
				echo '<div id="linea2">';
					echo '<a id="signup" class="botonLogin botonNaranja" href="logout.php">Salir</a>';
				echo '</div>';
			}
			else{
				echo '<div id="linea1">';
					echo '<input id="login" class="botonLogin botonNaranja" type="button" value="Iniciar sesion"></input>';
				echo '</div>';
				echo '<div id="linea2">';
					echo '<a id="signup" class="botonLogin botonNaranja" href="altaUsuario.html">Registrarse</a>';
				echo '</div>';
			}		
		echo '</div>';
	echo '</header>';
?>