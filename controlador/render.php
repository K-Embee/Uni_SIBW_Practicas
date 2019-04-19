<?php

function renderEvento($twig, $conn) {
    $evento = $_GET["evento"];

    $args = DBevento($conn, $evento);
    $args_I = DBimagenes($conn, $evento);
    $args_V = DBvideos($conn, $evento);
    $args_C = DBcomentarios($conn, $evento);
    $args_G = DBeventoGenero($conn, $evento);
    $menu = DBmenu($conn);

    if(!$args) {
        echo $twig->render('oops.html');
        exit();
    }

    $imprimir = false;
    if(array_key_exists("imprimir",$_GET)) {
        $imprimir = true;
    }

    $galeria = false;
    if(array_key_exists("galeria",$_GET)) {
        $galeria = true;
    }

    $ruta = $imprimir?'plantillaEventoImpresion.html':($galeria?'plantillaEventoGaleria.html':'plantillaEvento.html');

    $args = array_pop($args);

    if(!$args) {
        echo $twig->render('oops.html');
        exit();
    }

    echo $twig->render( $ruta, ['evento' => $args, 'imagenes' => $args_I, 'videos' => $args_V, 'comentarios' => $args_C, 'generos' => $args_G,
                        'listado_menu' => $menu]);
}

function renderPrincipal($twig, $conn) {
    $args = DBprincipal($conn);
    $menu = DBmenu($conn);

    echo $twig->render('plantillaPrincipal.html', ['peliculas' => $args, 'listado_menu' => $menu]);
}

function renderPorGenero($twig, $conn) {
    $genero = $_GET["genero"];
    $args = DBporGenero($conn, $genero);
    $menu = DBmenu($conn);

    if(!$args) {
        echo $twig->render('oops.html');
        exit();
    }

    echo $twig->render('plantillaPrincipal.html', ['peliculas' => $args, 'listado_menu' => $menu]);
}

function renderGenerica($twig, $conn) {
    $nombre = $_GET["pagina"];

    $args = DBgenerica($conn, $nombre);
    $menu = DBmenu($conn);

    if(!$args) {
        echo $twig->render('oops.html');
        exit();
    }

    echo $twig->render('plantillaGenerica.html', ['paginaNombre' => $args["Titulo"], 'Texto' => (($args["Texto"])), 'listado_menu' => $menu]);
}

function renderFB_TW($twig, $conn) {
    $evento = $_GET["evento"];
    $red = $_GET["fb_tw"];
    $args = DBevento($conn, $evento);

    if(!$args || !$red) {
        echo $twig->render('oops.html');
        exit();
    }

    if($red=="tw") {
        echo $twig->render('emergente.html', ['idEvento' => $evento, 'eventoNombre' => $args[0]->eventoNombre, 'red' => 'twitter']);
    }
    else if($red=="fb") {
        echo $twig->render('emergente.html', ['idEvento' => $evento, 'eventoNombre' => $args[0]->eventoNombre, 'red' => 'facebook']);
    }
    else {
        echo $twig->render('oops.html');
        exit();
    }
}

?>
