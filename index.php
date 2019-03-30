<?php

//Inicializamos el motor de plantillas
require_once './vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('./directorioTemplates');
$twig = new Twig_Environment($loader, ['cache' => './directorioCache']);

// Averiguo que la página que se quiere mostrar es la del evento 12,
// porque hemos accedido desde http://localhost/?evento=12
// Busco en la base de datos la informacion del evento y lo
// almaceno en las variables $eventoNombre, $eventoFecha, $eventoFoto...

echo $twig->render('plantillaEvento.html', ['nombre' => $eventoNombre, 'fecha' => $eventoFecha, 'foto' => $eventoFoto]);

?>
