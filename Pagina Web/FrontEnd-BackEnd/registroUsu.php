<?php
	echo '<legend id="tituloCuadro" >Registro</legend>';
	echo '<div class="camposDatos col-desktop-6 col-tablet-8 col-phone-12">';
		echo '<input class="campo" type="text" name="nombre" placeholder="Escribe tu nombre" autocomplete maxlenght="50"/><br>';

		echo '<input class="campo" type="text" name="nick" placeholder="Escribe un nombre de usuario (Ej. @usuario)" 
				autocomplete maxlenght="50"/><br>';
		
		echo '<input class="campo" type="email" name="email"placeholder="Escribe tu email"/><br>';
		
		echo '<input class="campo" type="password" name="pwd" placeholder="Escribe una contraseña" minlenght="8"/><br>';
		
		echo '<input class="campo" type="text" name="cp" placeholder="Escribe tu código postal" minlenght="5"/><br>';
		
		echo '<a class="boton-grand botonVerde" href="index.php">Registrarse</a>';

		echo '<input type="reset" class="boton-grand botonBlanco" value="Borrar datos"></input><br>';
	echo '</div>';
?>