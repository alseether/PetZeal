
	$(document).ready(function(){
	    $("#header").load("cabecera.php");
	    $("#slideIzq").load("postsGenerales.php");
	    $("#content").load("central.php?id=0&p=1&np=0&nm=0");
	    $("#slideDer").load("infoEstatica.html");


	});

	function cambioMascota(id, posts, idPosts, idPubli){
		
		  $("#content").load("central.php?id=" + id + "&p=" + posts + "&np=" + idPosts+ "&nm=" + idPubli);
	}

	
