var comments_hidden = true;

var words = ['digimon','rapido y furioso','dreamworks','thanos','azul',
			'pp','psoe','cs','podemos','vox'];

function toggle_comments(){
	var panel = document.getElementById("commentpanel");
    var button = document.getElementById("commentbutton");
    panel.style.display = comments_hidden?"block":"none"; //Mostrar/Ocultar panel
	button.style.right = comments_hidden?"30%":"0"; //Mover boton

	comments_hidden = !comments_hidden;
}

function validate_form(){
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var comment = document.getElementById("comentario");

    if(name.value.length == 0 || email.value.length == 0 || comment.value.length == 0)
    {
        alert("Hay campos vacíos");
    }
	else if(!validate_email(email.value)){
		alert("Email invalido");
	}
    else {
        add_comment();
    }

    return false; //Cambiar cuando usemos PHPs de verdad ya
}

function validate_email(text){
	return (text.search(/(\w+\.)*\w+@(\w+\.)*\w+/i) != -1); //Simplificado para no arrancar el pelo
}

function add_comment(){
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var comment = document.getElementById("comentario");

    var new_comment = document.createElement("DIV");
    var autor = document.createElement("SPAN");
    var fecha = document.createElement("SPAN");

    new_comment.classList.add("comment");
    autor.classList.add("bold");
    fecha.classList.add("bold");

    autor.appendChild(document.createTextNode("Autor: "));
    fecha.appendChild(document.createTextNode("Fecha: "));

    new_comment.appendChild(autor);
    new_comment.appendChild(document.createTextNode(name.value));
    new_comment.appendChild(document.createElement("BR"));
    new_comment.appendChild(fecha);
    new_comment.appendChild(document.createTextNode((new Date()).toString()));
    new_comment.appendChild(document.createElement("BR"));
    new_comment.appendChild(document.createTextNode(comment.value));

    document.getElementById("comments").appendChild(new_comment);
}

function censor_comment(){
	var comment = document.getElementById("comentario").value;
	var words_regex;

	for(var i = 0; i < words.length; i++){
		words_regex = new RegExp(words[i], "ig");
		comment = comment.replace(words_regex, "*".repeat(words[i].length));
	}
	document.getElementById("comentario").value = comment;
}
