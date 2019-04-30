<?php

function validar_consulta($entrada) {
    return preg_match('/^[a-zA-Z0-9\-_]+$/', $entrada); //Asegura que la cadena entera es carácteres alfanumericos
}

function renderEvento($twig, $conn) {
    $evento = $_GET["evento"];

    if(!validar_consulta($evento)) {
        echo $twig->render('emergente.html');
        exit();
    }

    $args = DBevento($conn, $evento);
    $args_I = DBimagenes($conn, $evento);
    $args_V = DBvideos($conn, $evento);
    $args_C = DBcomentarios($conn, $evento);
    $args_G = DBeventoGenero($conn, $evento);
    $menu = DBmenu($conn);

    $nombreUsuario = NULL;
    if (array_key_exists("usuario",$_SESSION)) {
        $nombreUsuario = $_SESSION["usuario"]->idUsuario;
    }

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
                        'listado_menu' => $menu, 'nombre_usuario' => $nombreUsuario]);
}

function renderPrincipal($twig, $conn) {
    $args = DBprincipal($conn);
    $menu = DBmenu($conn);

    $nombreUsuario = NULL;
    if(array_key_exists("usuario",$_SESSION)) {
        $nombreUsuario = $_SESSION["usuario"]->idUsuario;
    }

    echo $twig->render('plantillaPrincipal.html', ['peliculas' => $args, 'listado_menu' => $menu, 'nombre_usuario' => $nombreUsuario]);
}

function renderPorGenero($twig, $conn) {
    $genero = $_GET["genero"];

    if(!validar_consulta($genero)) {
        echo $twig->render('oops.html');
        exit();
    }

    $args = DBporGenero($conn, $genero);
    $menu = DBmenu($conn);

    $nombreUsuario = NULL;
    if (array_key_exists("usuario",$_SESSION)) {
        $nombreUsuario = $_SESSION["usuario"]->idUsuario;
    }

    if(!$args) {
        echo $twig->render('oops.html');
        exit();
    }

    echo $twig->render('plantillaPrincipal.html', ['peliculas' => $args, 'listado_menu' => $menu, 'nombre_usuario' => $nombreUsuario]);
}

function renderGenerica($twig, $conn) {
    $nombre = $_GET["pagina"];

    if(!validar_consulta($nombre)) {
        echo $twig->render('oops.html');
        exit();
    }

    $args = DBgenerica($conn, $nombre);
    $menu = DBmenu($conn);

    $nombreUsuario = NULL;
    if (array_key_exists("usuario",$_SESSION)) {
        $nombreUsuario = $_SESSION["usuario"]->idUsuario;
    }

    if(!$args) {
        echo $twig->render('oops.html');
        exit();
    }

    echo $twig->render('plantillaGenerica.html', ['paginaNombre' => $args["Titulo"], 'Texto' => (($args["Texto"])), 'listado_menu' => $menu, 'nombre_usuario' => $nombreUsuario]);
}

function renderFB_TW($twig, $conn) {
    $evento = $_GET["evento"];
    $red = $_GET["fb_tw"];

    if(!validar_consulta($evento) || !validar_consulta($red)) {
        echo $twig->render('oops.html');
        exit();
    }

    $args = DBevento($conn, $evento);

    if(!$args) {
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

function renderIdentificarse($twig, $conn, $error) {
    $menu = DBmenu($conn);

    $nombreUsuario = NULL;
    if (array_key_exists("usuario",$_SESSION)) {
        $nombreUsuario = $_SESSION["usuario"]->idUsuario;
    }

    echo $twig->render('plantillaIdentificador.html', ['listado_menu' => $menu, 'nombre_usuario' => $nombreUsuario, 'fail' => $error]);
}

function renderRegistrarse($twig, $conn, $error) {
    $menu = DBmenu($conn);

    $nombreUsuario = NULL;
    if (array_key_exists("usuario",$_SESSION)) {
        $nombreUsuario = $_SESSION["usuario"]->idUsuario;
    }

    echo $twig->render('plantillaRegistro.html', ['listado_menu' => $menu, 'nombre_usuario' => $nombreUsuario, 'fail' => $error]);
}
?>
