<?php
function DBevento($conn, $evento) {
    $sql = "SELECT * FROM evento WHERE idEvento=" . '\'' . $evento . '\'';
    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    return $result;
}

function DBimagenes($conn, $evento) {
    $sql = "SELECT url FROM imagen WHERE idEvento=" . '\'' . $evento . '\'';
    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    return $result;
}
?>
