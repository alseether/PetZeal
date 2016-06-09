<?php
	setcookie("log", "", time() - 3600); //Crea la cookie con cadicidad hace una hora, por tanto la borra
	setcookie("idUsu", "", time() - 3600);
	setcookie("nick", "", time() - 3600);
	setcookie("rol", "", time() - 3600);

	header('Location: ./index.html');
?>