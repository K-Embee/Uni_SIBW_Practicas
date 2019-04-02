<?php
function DBevento($conn, $evento) {
    $sql = "SELECT * FROM evento WHERE eventoNombre=" . '\'' . $evento . '\'';

    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    mysqli_close($conn);
    return $result->fetch_assoc();
}
?>
