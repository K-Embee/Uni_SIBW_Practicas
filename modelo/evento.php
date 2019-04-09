<?php
function DBevento($conn, $evento) {
    $sql = "SELECT * FROM evento WHERE idEvento=" . '\'' . $evento . '\'';
    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    $array = array();

    while($row = $result->fetch_assoc()){
        array_push($array, new Evento($row));
    }
    return $array;
}

function DBimagenes($conn, $evento) {
    $sql = "SELECT * FROM imagen WHERE idEvento=" . '\'' . $evento . '\'';
    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    $array = array();

    while($row = $result->fetch_assoc()){
        array_push($array, new Imagen($row));
    }
    return $array;
}
?>
