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

//Devuelve un array asociativo con clave de nombre y valor de URL **O** otro array asociativo con clave nombre y valor id
function DBmenu($conn) {
    $array = array();

    $array["Página Principal"] = "/";
    $array["Géneros"] = DBlistadoGenero($conn, true);
    $array["Otras páginas"] = DBlistadoPaginas($conn, true);

    return $array;
}

//Las siguientes funciones devuelven un listado con el ID como la clave y la URL o ID de la página correspondiente (dependiendo del bool $url).
//Recuperar el id en un bucle con foreach($array as $key => $value) en PHP, o {% for key, value in array %} en twig
function DBlistadoGenero($conn, $url) {
    $sql = "SELECT * FROM  genero";
    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    $array = array();

    while($row = $result->fetch_assoc()){
        $array[$row["genero"]] = (($url) ? "/?genero=" : "") . $row["idGenero"];
    }
    return $array;
}

function DBlistadoPaginas($conn, $url) {
    $sql = "SELECT * FROM  pag_info";
    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    $array = array();

    while($row = $result->fetch_assoc()){
        $array[$row["titulo"]] = (($url) ? "/?pagina=" : "") . $row["idPagina"];
    }
    return $array;
}




?>
