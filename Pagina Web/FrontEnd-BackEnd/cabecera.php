<?php
	session_start(); 
	echo '<header class = "col-desktop-12 col-tablet-12 col-phone-12" >';
		echo '<a id="logoCabecera" href="index.php"></a>';
		echo '<div id="barraBusqueda">';
			echo '<input type="text" name="Busqueda" placeholder="Buscar" id="busquedaEntrada">';
			echo '<a id="lupa" class="col-desktop-1 col-tablet-1 col-phone-1" href="buscar.php"></a>';
		echo '</div>';
		if(isset($_SESSION["log"]) && $_SESSION["log"]==true)
			echo '<a id="logoCorreo" href="mensajeria.php"></a>';
		echo '<div id="camposLogin" >';
			if(isset($_SESSION["log"]) && $_SESSION["log"]==true){
				echo '<div id="linea1">';
					echo '<a class="botonLogin botonNaranja" href="infoUsu.php">'.$_SESSION["nick"].'</a>';
				echo '</f>';
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

	echo '<form class="cajaCambiarFoto col-desktop-4 col-tablet-4 col-phone-12" method="post" action="login.php">';
		echo '<div class="mensajeConfirmacion">Iniciar sesión</div>';
		echo '<div>';
			echo '<input class="campoLogin" type="text" name="usuario" placeholder="Escribe tu email o nombre de usuario" 
					autocomplete maxlenght="50"/><br>';
			echo '<input class="campoLogin" type="password" name="passwd" placeholder="Escribe tu contraseña" minlenght="8"/><br>';
		echo '</div>';
		echo '<div class="botoneraConfirmacion">';
			echo '<input id="botonHecho"  class ="boton-grand botonVerde col-desktop-5 col-tablet-5 col-phone-11" type="submit" value="Inicial sesion"></input>';
			echo '<input id="cancelar" class="boton-grand botonBlanco col-desktop-5 col-tablet-5 col-phone-11" type="button" value="Cancelar"></input>';
		echo '</div>';
	echo '</form>';
?>