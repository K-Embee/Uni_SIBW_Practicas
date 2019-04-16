<?php
function DBgenerica($conn, $arg) {
    $sql = "SELECT titulo, texto FROM pag_info WHERE idPagina =" . '\'' . $arg . '\'';

    $result = $conn->query($sql) or die("Error de servidor: SQL error");
    $array = array();

    if($row = $result->fetch_assoc()) {
        $array["Titulo"] = $row["titulo"];
        $array["Texto"] = $row["texto"];
    }

    return $array;
}
?>
