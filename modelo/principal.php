<?php
function DBprincipal($conn) {
    $sql = "SELECT idEvento, eventoNombre FROM evento";

    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    $array = array();

    while($row = $result->fetch_assoc()){
        array_push($array, $row);
    }
    return $array;
}
?>
