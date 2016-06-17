$(document).ready(function(){
    $("#header").load("cabecera.php");
	var corr = getURLParameter("corr");
	if(corr == 0 || corr == null) $("#content").load("mensajeria.php?corr=0");
	else $("#content").load("mensajeria.php?corr="+corr);
	
	muestraError();
});	


