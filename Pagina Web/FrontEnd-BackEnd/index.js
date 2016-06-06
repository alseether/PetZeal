
	$(document).ready(function(){
	    $("#header").load("cabecera.php");
	    $("#slideIzq").load("postsGenerales.php");
	    $("#content").load("central.php?id=0&p='.false.'");
	    $("#slideDer").load("infoEstatica.html");


	});

	function cambioMascota(id, posts){
		
		  $("#content").load("central.php?id=" + id + "&p=" + posts);
	}