<?php
function DBconnect() {
    $servername = "localhost";
    $username = "";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
};

function DBevento($conn, $evento) {
    $sql = "SELECT * FROM EVENTO WHERE eventoNombre=" . '\'' . $evento . '.\'';

    $result = $conn->query($sql);

    return $result;
}

?>
