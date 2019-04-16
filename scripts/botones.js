function botonTwitter(){
    var mensaje;
    var myWindow = window.open("", "publicar", "width=300,height=200");
    var nombre = document.getElementById("eventoNombre").innerHTML;
    var imagen =document.getElementById("imagenPortada").cloneNode();
    //mensaje ="Se publicará en twitter el siguiente mensaje:\n " + nombre + "\n"

    myWindow.document.write("<p>Se publicará en twitter el siguiente mensaje: </p>");
    myWindow.document.writeln("<var>" + nombre + "</var>");
    myWindow.document.write("<button onclick=\"close()\">Aceptar</button>")
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
