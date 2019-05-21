<?php

//Se carga el controlador y modelo
require './controlador/class.php';
require './modelo/modelo.php';
require './controlador/render.php';
require './controlador/misc.php';
require './controlador/comentario.php';
require './controlador/sesiones.php';
//Inicializamos el motor de plantillas
require_once './vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('./directorioTemplates');
$twig = new Twig_Environment($loader, ['cache' => false]); //Cambiar false a './directorioCache para usar la cache'

//Inicializamos la sesion del Usuario
session_start();

definirPermisos();

$conn = DBconnect();

if (array_key_exists("logout",$_GET)) {
    session_unset();
}

if (array_key_exists("infousuario",$_GET)) {
    funcionInfoUsuario($twig, $conn);
}

if ((array_key_exists("modificar",$_GET) || array_key_exists("aniadir",$_GET))) {
    funcionAlterarEvento($twig, $conn);
}

if (array_key_exists("listado",$_GET)) {
    if (array_key_exists("q",$_GET)) {
        funcionQuery($twig, $conn);
        exit();
    }
    funcionListado($twig, $conn);
}

if (array_key_exists("identificarse",$_GET)) {
    $error = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        iniciarSesion($conn);
        $error = true;
    }
    if (!array_key_exists("usuario",$_SESSION) || is_null($_SESSION["usuario"])) {
        renderIdentificarse($twig, $conn, $error);
        mysqli_close($conn);
        exit();
    }
}
if (array_key_exists("registrarse",$_GET)) {
    $error = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = !(registrarse($conn));
        if(!$error) {
            iniciarSesion($conn);
            renderPrincipal($twig, $conn);
            mysqli_close($conn);
            exit();
        }
    }
    if (!array_key_exists("usuario",$_SESSION) || is_null($_SESSION["usuario"])) {
        renderRegistrarse($twig, $conn, $error);
        mysqli_close($conn);
        exit();
    }
}

if (array_key_exists("evento",$_GET)) {
    funcionEvento($twig, $conn);
}

else if (array_key_exists("pagina",$_GET)) {
    renderGenerica($twig, $conn);
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
