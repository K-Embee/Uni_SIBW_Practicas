<?php

//Se carga el controlador y modelo
require './controlador/class.php';
require './modelo/modelo.php';
require './controlador/render.php';
//Inicializamos el motor de plantillas
require_once './vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('./directorioTemplates');
$twig = new Twig_Environment($loader, ['cache' => false]); //Cambiar false a './directorioCache para usar la cache'

// Averiguo que la página que se quiere mostrar es la del evento 12,
// porque hemos accedido desde http://localhost/?evento=12
// Busco en la base de datos la informacion del evento y lo
// almaceno en las variables $eventoNombre, $eventoFecha, $eventoFoto...

$conn = DBconnect();

if (array_key_exists("evento",$_GET)) {
    renderEvento($twig, $conn);
    mysqli_close($conn);
    exit();
}
else{
    renderPrincipal($twig, $conn);
    mysqli_close($conn);
    exit();
}

exit();
?>
