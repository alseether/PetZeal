<?php
	session_start(); 
	echo '<header class = "col-desktop-12 col-tablet-12 col-phone-12" >';
		echo '<a id="logoCabecera" href="index.php"></a>';
		echo '<div id="barraBusqueda">';
			echo '<input type="text" name="Busqueda" placeholder="Buscar" id="busquedaEntrada">';
			echo '<a id="lupa" class="col-desktop-1 col-tablet-1 col-phone-1" href="buscar.php"></a>';
		echo '</div>';
		if(isset($_SESSION["login"]) && $_SESSION["login"]==true)
			echo '<a id="logoCorreo" href="mensajeria.php"></a>';
		echo '<div id="camposLogin" >';
			if(isset($_SESSION["login"]) && $_SESSION["login"]==true){
				echo '<div id="linea1">';
					echo '<a id="login" class="botonLogin botonNaranja" href="infoUsu.php">Mi perfil</a>';
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
					echo '<a id="signup" class="botonLogin botonNaranja" href="registro.php">Registrarse</a>';
				echo '</div>';
			}		
		echo '</div>';
	echo '</header>';
	echo '<div class="cajaCambiarFoto col-desktop-4 col-tablet-4 col-phone-12">';
		echo '<div class="mensajeConfirmacion">Iniciar sesión</div>';
		echo '<div>';
			echo '<input class="campoLogin" type="text" name="nombre" placeholder="Escribe tu email o nombre de usuario" 
					autocomplete maxlenght="50"/><br>';
			echo '<input class="campoLogin" type="password" name="pwd" placeholder="Escribe tu contraseña" minlenght="8"/><br>';
		echo '</div>';
		echo '<div class="botoneraConfirmacion">';
			echo '<a id="botonHecho"  class =" boton-grand botonVerde col-desktop-5 col-tablet-5 col-phone-11" href="login.php">Iniciar Sesión</a>';
			echo '<a id="cancelar" class="boton-grand botonBlanco col-desktop-5 col-tablet-5 col-phone-11">Cancelar</a>';
		echo '</div>';
	echo '</div>';
?>