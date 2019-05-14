function buscarEvento(){
    var input = document.getElementById("myInput").value;
    var listado = document.getElementById("listadoComentarios");
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
    }
}

function buscarEventoAJAX(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if (str.length == 0) {
            document.getElementById("myInput").value = "";
            return;
        }
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("myInput").value = this.responseText;
            }
        };
        xhttp.open("GET", "getEvento.php?q="+str, true);
        xhttp.send();
    }
}

function buscarComentario(){
    var input = document.getElementById("myInput").value;
    var listado = document.getElementById("listadoComentarios");
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
    }
}
