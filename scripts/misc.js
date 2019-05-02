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
