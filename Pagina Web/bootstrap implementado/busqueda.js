
	$(document).ready(function(){
		var search, str;
		search = "busqueda.php?search=" + getURLParameter('search');
		//document.writeln(search);
	    search = search.split(' ').join('+');//search.replace(" ","+");
	    //document.writeln(search);
	    $("#header").load("cabecera.php");
	    $("#content").load(search);
	    $("#slideDer").load("infoEstatica.html");
	});	