<?php

function renderEvento($twig, $conn) {
    $evento = $_GET["evento"];

    $args = DBevento($conn, $evento);
    $args_I = DBimagenes($conn, $evento);
    $args_V = DBvideos($conn, $evento);
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

    echo $twig->render( $ruta, ['eventoNombre' => $args->eventoNombre, 'fecha_ultima_mod' => $args->fecha_ultima_mod,
                        'estudios' => $args->estudios, 'distribuidora' => $args->distribuidora,
                        'fechaEstreno' => $args->fechaEstreno, 'enlace_twitter' => $args->enlace_twitter,
                        'enlace_fb' => $args->enlace_fb, 'descripcion' => $args->descripcion, 'idEvento' => $args->idEvento,
                        'fecha_creacion' => $args->fecha_creacion, 'imagenes' => $args_I, 'videos' => $args_V,
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

    if(!$args) {
        echo $twig->render('oops.html');
        exit();
    }

    echo $twig->render('plantillaPrincipal.html', ['peliculas' => $args]);
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
?>
