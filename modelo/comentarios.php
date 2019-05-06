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

function DBtodosComentarios($conn) {
    $sql = "SELECT * FROM comentarios";
    $result = $conn->query($sql) or die("Error de servidor: SQL error");

    $array = array();

    while($row = $result->fetch_assoc()){
        array_push($array, new Comentario($row));
    }
    return $array;
}

//Borra de la BD
function DB_DROPcomentario($conn, $idcomentario) {
    $sql = "DELETE FROM comentarios WHERE idComentario =" . $idcomentario ;
    echo $sql;
    $conn->query($sql) or die("Error de servidor: SQL error");
}

function  DB_UPDATEcomentario($conn, $comentario) {
    $texto = mysqli_real_escape_string($conn, $comentario->texto);
    $sql = "UPDATE comentarios SET texto = '{$texto} (Modificado por el moderador)'
    WHERE idComentario = {$comentario->idComentario}";
    $conn->query($sql) or die("Error de servidor: SQL error");
}
?>
