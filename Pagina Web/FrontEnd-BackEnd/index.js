window.onload = function(){
	alert("PUTA");
	function ini() {
		alert("PUTA");
	    $("#header").load("prueba.html");
	}
}

function getCookie(galleta) {
    var name = galleta + "=";
    var arr = document.cookie.split(';');
    for(var i=0; i<arr.length; i++) {
        var cook = arr[i];
        while (cook.charAt(0)==' ') 
        	cook = cook.substring(1);
        if (cook.indexOf(name) == 0) 
        	return cook.substring(name.length, cook.length);
    }
    return "";
}