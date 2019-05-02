<?php
//Devuelve la lista de palabras prohibidas de la BD
function DBcensura($conn) {
    $sql = "SELECT palabra FROM censura";

    $result = $conn->query($sql) or die("Error de servidor: SQL error");
    $array = array();

    while($row = $result->fetch_assoc()) {
        array_push($array, $row["palabra"]);
    }

    return $array;
}

//Inserta un comentario a la BD
function  DB_INcomentario($conn, $comentario) {
    $sql = "INSERT INTO comentarios (idEvento, ip, nombre, correo, texto) VALUES
        ('$comentario->idEvento','$comentario->ip','$comentario->nombre','$comentario->correo','$comentario->texto')";
    $result = $conn->query($sql) or die("Error de servidor: SQL error");
}

//Devuelve el contenido de una página genérica
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

//Devuelve un array asociativo con clave de nombre y valor de URL **O** otro array asociativo con clave nombre y valor id
function DBmenu($conn) {
    $array = array();

    $array["Página Principal"] = "/";
    $array["Géneros"] = DBlistadoGenero($conn, true);
    $array["Otras páginas"] = DBlistadoPaginas($conn, true);
    if (array_key_exists("usuario",$_SESSION)) {
        $permisos = array('editar perfil' => "editar perfil", 'comentarios' => "comentarios", 'eventos' => "eventos", 'usuarios' => "usuarios");
        $array["Panel de control"] = $permisos;
    }

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

function DBtodosComentarios($conn) {
    $sql = "SELECT * FROM comentarios";
    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    $array = array();

    while($row = $result->fetch_assoc()){
        array_push($array, new Comentario($row));
    }
    return $array;
}

function DBtodosUsuarios($conn) {
    $sql = "SELECT * FROM usuario";
    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    $array = array();

    while($row = $result->fetch_assoc()){
        array_push($array, new Usuario($row));
    }
    return $array;
}

//Borra de la BD
function DB_DROPcomentario($conn, $idcomentario) {
    $sql = "DELETE FROM comentarios WHERE idComentario =" . $idcomentario ;
    $result = $conn->query($sql) or die("Error de servidor: SQL error");
}

function DB_DROPevento($conn, $idevento) {
    $sql = "DELETE FROM evento WHERE idComentario =" . $idevento ;
    $result = $conn->query($sql) or die("Error de servidor: SQL error");
}

//Selecciona un usuario
function DBusuarios($conn, $idUsuario) {
    $sql = "SELECT * FROM usuario WHERE idUsuario =" . '\'' . $idUsuario . '\'';
    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    $array = array();

    while($row = $result->fetch_assoc()){
        array_push($array, new Usuario($row));
    }
    return $array;
}
?>
