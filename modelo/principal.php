<?php
function DBprincipal($conn) {
    $sql = "SELECT idEvento, eventoNombre FROM evento";

    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    return $result;
}
?>
