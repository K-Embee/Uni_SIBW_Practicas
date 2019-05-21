function buscarEvento(){ //Obsoleto, se usa AJAX para eventos y comentarios
    /*var input = document.getElementById("myInput").value;
    var listado = document.getElementById("listado");
    var comentarios = listado.getElementsByClassName("listado");
    var i;
    for(i=0; i<comentarios.length; i++){
        let comentario = comentarios[i];
        var nombre = comentario.id.split("-").pop();
        if( nombre.toUpperCase().indexOf(input.toUpperCase()) > -1){
            comentario.style.display = "";
        }
        else{
            comentario.style.display = "none";
        }
    }*/
}

function buscarAJAX(evento){
    var xhttp = new XMLHttpRequest();
    var str = document.getElementById("myInput");
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("listado").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", (evento ? "?listado=eventos&q=" : "?listado=comentarios&q=") + str.value, true);
    xhttp.send();
}

function buscarComentario(){ //Obsoleto, se usa AJAX para eventos y comentarios
    /*var input = document.getElementById("myInput").value;
    var listado = document.getElementById("listado");
    var comentarios = listado.getElementsByClassName("listado");
    var i;
    for(i=0; i<comentarios.length; i++){
        let comentario = comentarios[i];
        var nombre = comentario.id.split("-").pop();
        if( nombre.toUpperCase().indexOf(input.toUpperCase()) > -1){
            comentario.style.display = "";
        }
        else{
            comentario.style.display = "none";
        }
    }*/
}
