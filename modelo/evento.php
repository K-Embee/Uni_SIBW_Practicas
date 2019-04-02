<?php

//Conectarse a la BD
function DBconnect() {
    $servername = "localhost";
    $username = "";
    $password = "";
    $database = "eventos";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
};

//Buscar evento por nombre
function DBevento($conn, $evento) {
    $sql = "SELECT * FROM evento WHERE eventoNombre=" . '\'' . $evento . '\'';
    echo $sql;
    $result = $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
    echo "successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    echo $result;
    //return $result->fetch_assoc();
}

?>
