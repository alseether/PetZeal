<?php
	setcookie("log", false, time() + (24*3600));	// tiempo de expiracion, 1 dia
	setcookie("idUsu", NULL, time() + (24*3600));
	setcookie("nick", NULL, time() + (24*3600));
	setcookie("rol", NULL, time() + (24*3600));

	header('Location: ./index.html');
?>