
	$(document).ready(function(){
		var search;
		search = "?search=" + getURLParameter('search');
	    $("#header").load("cabecera.php");
	    $("#content").load("busqueda.php" + search);
	    $("#slideDer").load("infoEstatica.html");
	});	