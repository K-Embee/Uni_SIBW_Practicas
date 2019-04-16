var myWindow;

function botonTwitter(){
    var mensaje;
    myWindow = window.open("", "publicar", "width=300,height=200");
    var nombre = document.getElementById("eventoNombre").innerHTML;
    var imagen = document.getElementById("imagenPortada");

    myWindow.document.writeln("<p>Se publicará en twitter el siguiente mensaje: </p>");
    myWindow.document.writeln("<var>" + nombre + "</var>");
    myWindow.document.writeln("<p> @estrenos_favoritos</p>");
    myWindow.document.body.appendChild(imagen);
    myWindow.document.writeln("<button onclick=\"window.close()\">Aceptar</button>")
    //var opcion = alert("Se publicará en twitter el siguiente mensaje:\n " + nombre + "\n" + imagen);
    /*if (opcion == true) {
        mensaje = "Has clickado OK";
	} else {
	    mensaje = "Has clickado Cancelar";
	}*/
    //document.getElementById("ventanaTwitter").innerHTML = mensaje;

}

function botonFacebook(){

}
