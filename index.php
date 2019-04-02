<?php

//Inicializamos el motor de plantillas
require_once './vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('./directorioTemplates');
$twig = new Twig_Environment($loader, ['cache' => './directorioCache']);

// Averiguo que la página que se quiere mostrar es la del evento 12,
// porque hemos accedido desde http://localhost/?evento=12
// Busco en la base de datos la informacion del evento y lo
// almaceno en las variables $eventoNombre, $eventoFecha, $eventoFoto...


echo $twig->render('plantillaEvento.html', ['eventoNombre' => 'Detective Pikachu', 'estudios' => 'Pika Pi Productions', 'distribuidora' => 'Warner Brothers', 'genero' => 'Accion, Aventura', 'fechaEstreno' => 'Pikachu de febrero', 'enlace_twitter' => 'https://www.twitter.com', 'enlace_fb' => 'https://www.facebook.com', 'descripcion' => 'BLOOD FOR THE BLLOD GOD', 'imagen1' => './imgs/pikachu-inicio.jpg', 'imagen2' => './imgs/pikachu.jpg']);

?>
