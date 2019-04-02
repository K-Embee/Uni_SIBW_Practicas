<?php

//Se carga el modelo
require './modelo/modelo.php';
//Inicializamos el motor de plantillas
require_once './vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('./directorioTemplates');
$twig = new Twig_Environment($loader, ['cache' => './directorioCache']);

// Averiguo que la página que se quiere mostrar es la del evento 12,
// porque hemos accedido desde http://localhost/?evento=12
// Busco en la base de datos la informacion del evento y lo
// almaceno en las variables $eventoNombre, $eventoFecha, $eventoFoto...

$conn = DBconnect();

if (!$_GET["evento"]) {
    exit();
}

$evento = str_replace("_"," ",$_GET["evento"]);

$args = DBevento($conn, $evento);

if(!$args) {
    echo "Error de servidor: Acceso a BD fallada";
    exit();
}

echo $twig->render('plantillaEvento.html', ['eventoNombre' => $args["eventoNombre"], 'estudios' => $args["estudios"],
                    'distribuidora' => $args["distribuidora"], 'genero' => $args["genero"], 'fechaEstreno' => $args["fechaEstreno"],
                    'enlace_twitter' => $args["enlace_twitter"], 'enlace_fb' => $args["enlace_fb"],
                'descripcion' => $args["descripcion"]/*, 'imagen1' => $args["imagen1"], 'imagen2' => $args["imagen2"]*/]);

?>
