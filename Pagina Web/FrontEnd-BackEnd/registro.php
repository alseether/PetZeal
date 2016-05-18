<html>
	<head>
		<title>PetZeal</title>
		<meta charset="utf-8"</meta>
		<link rel="stylesheet" type="text/css" href="cssreset.css"/>			
	 	<link rel="stylesheet" type="text/css" href="estructura.css" />
	 	<link rel="stylesheet" type="text/css" href="interfaz.css"/>
	 	<script scr="./funciones.js"></script>
	</head>
	<body id="cuerpo-secundario">
		<?php include 'cabecera.php';?>
		<form action="" method="post" enctype="multipart/form-data" class="formulario col-desktop-7 col-tablet-8 col-phone-12">
			<fieldset>
				<?php 
					$_SESSION["rol"] = "esp";
					if(isset($_SESSION["rol"]) && $_SESSION["rol"]=="esp")
						include 'registroEsp.php';
					else
						include 'registroUsu.php';
				?>
			</fieldset>
		</form>	
	</body>
</html>
