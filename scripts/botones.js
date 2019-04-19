function closeWindow() {
    self.close();
}

function botonTwitter(idEvento){
    window.open("/?evento="+idEvento+"&fb_tw=tw" , "publicar", "width=400,height=300");
}

function botonFacebook(idEvento){
    window.open("/?evento="+idEvento+"&fb_tw=fb" , "publicar", "width=400,height=300");
}

//Una tonteria hecha con localStorage

function misOjos(toggle) {
    if (window.localStorage !=  null) {
        var misOjos = JSON.parse(localStorage.getItem('misOjos'));
        if(toggle){
            if(misOjos) {
                localStorage.setItem('misOjos', JSON.stringify(false));
                misOjos = false;
            }
            else {
                localStorage.setItem('misOjos', JSON.stringify(true));
                misOjos = true;
            }
        }
        var body =  document.getElementsByTagName("BODY")[0];
        body.style.filter = ((misOjos)?"invert(1)":"hue-rotate(0)");
        console.log(body);
    }
    else {
          // No localStorage support
    }
}
