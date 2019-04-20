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
        document.body.style.backgroundImage = ((misOjos)?"url(/imgs/oops.jpg)":"url(/imgs/background.jpg)");
        document.body.style.opacity = ((misOjos)?"0.6":"1");
        console.log(body);
    }
    else {
          // No localStorage support
    }
}
