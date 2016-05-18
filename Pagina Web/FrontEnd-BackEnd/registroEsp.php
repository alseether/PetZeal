<?php
	echo '<legend id="tituloCuadro" >Registro Premium</legend>';
	echo '<div class="camposDatos col-desktop-6 col-tablet-8 col-phone-12">';
		echo '<input class="campo" type="text" name="direccion" placeholder="Escribe tu dirección" minlenght="5"/><br>';

		echo '<input class="campo" type="phone" name="tlf" placeholder="Escribe tu teléfono" minlenght="5"/><br>';
		
		echo '<input class="campo" type="text" name="ocupacion" placeholder="Escribe tu ocupacion" minlenght="5"/><br>';
		
		echo '<input class="campo" type="url" name="cp" placeholder="Escribe tu página web" minlenght="5"/><br>';
		
		echo '<textarea class="campo" type="text" name="descripcion" placeholder="Descripcion"></textarea><br>';
		
		echo '<a class="boton-grand botonVerde" href="index.php">Registrarse</a>';

		echo '<input type="reset" class="boton-grand botonBlanco" value="Borrar datos"></input><br>';
	echo '</div>';
?>