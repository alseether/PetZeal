$(document).ready(function(){
	var pr = getURLParameter('pr');
	var parameters = "pr=" + pr;
    $("#header").load("cabecera.php");
    $("#content").load("alta.php?" + parameters);
});	