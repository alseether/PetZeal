<?php
	echo '<div class="cajaCambiarFoto col-desktop-4 col-tablet-4 col-phone-12">';
		echo '<div class="mensajeConfirmacion">Iniciar sesión</div>';
		echo '<div>';
			echo '<input class="campoLogin" type="text" name="nombre" placeholder="Escribe tu email o nombre de usuario" 
					autocomplete maxlenght="50"/><br>';
			echo '<input class="campoLogin" type="password" name="pwd" placeholder="Escribe tu contraseña" minlenght="8"/><br>';
		echo '</div>';
		echo '<div class="botoneraConfirmacion">';
			echo '<a id="botonHecho"  class =" boton-grand botonVerde col-desktop-5 col-tablet-5 col-phone-11" href="inicioConLogin.html">Iniciar Sesión</a>';
			echo '<a class="boton-grand botonBlanco col-desktop-5 col-tablet-5 col-phone-11" href="index.html">Cancelar</a>';
		echo '</div>';
	echo '</div>';
?>