<?php

function renderEvento($twig, $conn) {
    $evento = $_GET["evento"];

    $args = DBevento($conn, $evento);
    $args_I = DBimagenes($conn, $evento);

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
                        'fecha_creacion' => $args->fecha_creacion, 'imagenes' => $args_I]);
}

function renderPrincipal($twig, $conn) {
    $args = DBprincipal($conn);

    echo $twig->render('plantillaPrincipal.html', ['peliculas' => $args]);
}
?>
