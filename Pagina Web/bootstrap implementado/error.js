
	function cargaIndex(error){
		if(error == 1 || error == 2){
			window.alert("Nombre de usuario inválido");
		}
		else if(error == 3){
			window.alert("Contraseña incorrecta");
		}
	    $("#header").load("cabecera.php");
	    $("#slideIzq").load("postsGenerales.php");
	    $("#content").load("central.php?id=0&p=1");
	    $("#slideDer").load("infoEstatica.html");


	});
	
	function cargaAltaUsuario(error){
		if(error == 4){
			window.alert("Datos de Usuario Inválidos");
		}
		else if(error == 5){
			window.alert("El nick no esta disponible");
			
		}
		 $("#header").load("cabecera.php");
	    $("#slideIzq").load("postsGenerales.php");
	    $("#content").load("central.php?id=0&p=1");
	    $("#slideDer").load("infoEstatica.html");
	}