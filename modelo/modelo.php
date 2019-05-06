<?php
require './modelo/evento.php'; //Las funciones de bases de datos que tienen que ver con las paginas de eventos
require './modelo/principal.php'; //Las funciones de bases de datos que tienen que ver con mostrar la página principal
require './modelo/misc.php'; //Las funciones de bases de datos que no tienen que ver con lo anterior
require './modelo/sesiones.php'; //Las funciones de bases de datos que tienen que ver con el registro de usuarios
require './modelo/comentarios.php'; //Las funciones de bases de datos que tienen que ver con el registro/manejo de comentarios
require './modelo/comentarios.php'; //Las funciones de bases de datos que tiene que ver con la gestión de comentarios
function DBconnect() {
    $servername = "localhost";
    $username = "user";
    $password = "user";
    $db_name = "eventos";

    // Create connection y establelcer charset
    $conn = new mysqli($servername, $username, $password, $db_name);
    $conn->query("SET NAMES utf8");
    $conn->query("SET CHARACTER SET utf8");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
?>
