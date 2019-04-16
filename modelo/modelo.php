<?php
require './modelo/evento.php';
require './modelo/principal.php';
require './modelo/generico.php';
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
