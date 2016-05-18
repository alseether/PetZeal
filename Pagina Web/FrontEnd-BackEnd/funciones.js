window.onload = function(){

	function openTabMasc(evt, masctabName) {
	    // Declare all variables
	    var i, mastabcontent, masctablinks;

	    // Get all elements with class="tabcontent" and hide them
	    mastabcontent = document.getElementsByClassName("mastabcontent");
	    for (i = 0; i < mastabcontent.length; i++) {
	        mastabcontent[i].style.display = "none";
	    }

	    // Get all elements with class="tablinks" and remove the class "active"
	    masctablinks = document.getElementsByClassName("masctablinks");
	    for (i = 0; i < mastabcontent.length; i++) {
	        masctablinks[i].className = masctablinks[i].className.replace("active", "");
	    }

	    // Show the current tab, and add an "active" class to the link that opened the tab
	    document.getElementById(masctabName).style.display = "block";
	    evt.currentTarget.className += " active";
	}

	function openTabMen(evt, mentabName) {
	    // Declare all variables
	    var j, mentabcontent, mentablinks;

	    // Get all elements with class="tabcontent" and hide them
	    mentabcontent = document.getElementsByClassName("mentabcontent");
	    for (j = 0; j < mentabcontent.length; j++) {
	        mentabcontent[j].style.display = "none";
	    }

	    // Get all elements with class="tablinks" and remove the class "active"
	    mentablinks = document.getElementsByClassName("mentablinks");
	    for (j = 0; j < mentabcontent.length; j++) {
	        mentablinks[j].className = mentablinks[j].className.replace("active", "");
	    }

	    // Show the current tab, and add an "active" class to the link that opened the tab
	    document.getElementById(mentabName).style.display = "block";
	    evt.currentTarget.className += " active";
	}

	var viewBox = function(){
		var caja = document.getElementsByClassName("cajaCambiarFoto");
		if(caja[0].style.visibility == "visible")
 			caja[0].style.visibility = "hidden";
 		else
 			caja[0].style.visibility = "visible";
	}

	var viewPost = function(){
		var caja = document.getElementsByClassName("cajaCambiarFoto");
 		if(caja[0].style.visibility == "visible"){
 			caja[0].style.visibility = "hidden";
 			post.style["visibility"] = "visible";
 			comment.style["visibility"] = "visible";
 		}else{
 			caja[0].style.visibility = "visible";
 			post.style["visibility"] = "hidden";
 			comment.style["visibility"] = "hidden";
 		}
	}

	var closeBox = function(){
		var caja = document.getElementsByClassName("cajaCambiarFoto");
 		if(caja[0].style.visibility == "visible")
 			caja[0].style.visibility = "hidden";
 		else
 			caja[0].style.visibility = "visible";
	}



	document.getElementById("login").addEventListener('click',viewBox);
	document.getElementById("baja").addEventListener('click',viewBox);
	document.getElementById("botonCambiar").addEventListener('click',viewBox);
	document.getElementById("comentar").addEventListener('click',viewPost);
	document.getElementById("verPost").addEventListener('click',viewPost);
	document.getElementById("cancelar").addEventListener('click',closeBox);
}