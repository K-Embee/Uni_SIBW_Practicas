function closeWindow() {
    self.close();
}

function botonTwitter(idEvento){
    window.open("/?evento="+idEvento+"&fb_tw=tw" , "publicar", "width=400,height=300");
}

function botonFacebook(idEvento){
    window.open("/?evento="+idEvento+"&fb_tw=fb" , "publicar", "width=400,height=300");
}
