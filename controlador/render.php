<?php

function renderEvento($twig, $conn) {
    $evento = $_GET["evento"];

    $args = DBevento($conn, $evento);

    if(!$args) {
        echo $twig->render('oops.html');
        exit();
    }

    $imprimir = false;
    if(array_key_exists("imprimir",$_GET)) {
        $imprimir = true;
    }

    $args =  $args->fetch_assoc();

    if(!$args) {
        echo $twig->render('oops.html');
        exit();
    }

    echo $twig->render( $imprimir?'plantillaEventoImpresion.html':'plantillaEvento.html', ['eventoNombre' => $args["eventoNombre"],
                        'estudios' => $args["estudios"], 'distribuidora' => $args["distribuidora"], 'genero' => $args["genero"],
                        'fechaEstreno' => $args["fechaEstreno"], 'enlace_twitter' => $args["enlace_twitter"],
                        'enlace_fb' => $args["enlace_fb"], 'descripcion' => $args["descripcion"], 'idEvento' => $args["idEvento"]
                        /*, 'imagen1' => $args["imagen1"], 'imagen2' => $args["imagen2"]*/]);
}

function renderPrincipal($twig, $conn) {
    $args = DBprincipal($conn);
    $argsParsed = array();
    $i = 0;

    while($row = $args->fetch_assoc()){
        $argsParsed[$i] = $row;
        $i++;
    }

    echo $twig->render('plantillaPrincipal.html', ['peliculas' => $argsParsed]);
}
?>
