<?php
function DBprincipal($conn) {
    $sql = "SELECT * FROM evento";

    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    $array = array();

    while($row = $result->fetch_assoc()){
        array_push($array, new Evento($row));
    }
    return $array;
}

function DBporGenero($conn, $genero) {
    $sql = "SELECT * FROM evento NATURAL JOIN etiquetas WHERE idGenero=" . '\'' . $genero . '\'';
    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    $array = array();

    while($row = $result->fetch_assoc()){
        array_push($array, new Evento($row));
    }
    return $array;
}

//Las siguientes funciones devuelven un listado con el ID como la clave y el nombre como lo que se asocia.
//Recuperar el id en un bucle con foreach($array as $key => $value)
function DBlistadoGenero($conn) {
    $sql = "SELECT * FROM  genero";
    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    $array = array();

    while($row = $result->fetch_assoc()){
        $array[$row["idGenero"]] = $row["genero"];
    }
    return $array;
}

function DBlistadoPaginas($conn) {
    $sql = "SELECT * FROM  pag_info";
    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    $array = array();

    while($row = $result->fetch_assoc()){
        $array[$row["idPagina"]] = $row["titulo"];
    }
    return $array;
}




?>
