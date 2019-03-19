var comments_hidden = true;

function toggle_comments(){
	var panel = document.getElementById("commentpanel");
    var button = document.getElementById("commentbutton");
    panel.style.display = comments_hidden?"block":"none"; //Mostrar/Ocultar panel
	button.style.right = comments_hidden?"30%":"0"; //Determinar el nivel de facha

	comments_hidden = !comments_hidden;
}
