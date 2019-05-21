<?php
function DBevento($conn, $evento) {
    $sql = "SELECT * FROM evento WHERE idEvento=" . '\'' . $evento . '\'';
    $result = $conn->query($sql) or die("Error de servidor: SQL error in DBevento");

    $var = NULL;

    if($row = $result->fetch_assoc()){
        $var = new Evento($row);
    }
    return $var;
}

function DBeventoGenero($conn, $evento) {
    $sql = "SELECT genero FROM genero NATURAL JOIN etiquetas WHERE idEvento=" . '\'' . $evento . '\'';
    $result = $conn->query($sql) or die("Error de servidor: SQL error in DBeventoGenero");

    $array = array();

    while($row = $result->fetch_assoc()){
        array_push($array, $row["genero"]);
    }
    return $array;
}

function DBimagenes($conn, $evento) {
    $sql = "SELECT * FROM imagen WHERE idEvento=" . '\'' . $evento . '\'';
    $result = $conn->query($sql) or die("Error de servidor: SQL error in DBimagenes");

    $array = array();

    while($row = $result->fetch_assoc()){
        array_push($array, new Imagen($row));
    }
    return $array;
}

function DBvideos($conn, $evento) {
    $sql = "SELECT * FROM videos WHERE idEvento=" . '\'' . $evento . '\'';
    $result = $conn->query($sql) or die("Error de servidor: SQL error in DBvideos");

    $array = array();

    while($row = $result->fetch_assoc()){
        array_push($array, new Video($row));
    }
    return $array;
}

function DBcomentarios($conn, $evento) {
    $sql = "SELECT * FROM comentarios WHERE idEvento=" . '\'' . $evento . '\'';
    $result = $conn->query($sql) or die("Error de servidor: SQL error in DBcomentarios");

    $array = array();

    while($row = $result->fetch_assoc()){
        array_push($array, new Comentario($row));
    }
    return $array;
}
?>
