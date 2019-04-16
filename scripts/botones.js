function botonTwitter(){
    var mensaje;
    var nombre = document.getElementById("eventoNombre").innerHTML;
    var imagen =document.getElementById("imagenPortada").cloneNode();

    var opcion = confirm("Se publicará en twitter el siguiente mensaje:\n " + nombre + "\n");
    opcion.appendChild(imagen);
    if (opcion == true) {
        mensaje = "Has clickado OK";
	} else {
	    mensaje = "Has clickado Cancelar";
	}
    document.getElementById("ventanaTwitter").innerHTML = mensaje;
}
function botonFacebook(){

}
