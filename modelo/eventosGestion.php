<?php
function  DB_INevento($conn, $evento) {
    $sql = "INSERT INTO evento (idEvento, eventoNombre, estudios, distribuidora, fechaEstreno,
         descripcion, fecha_creacion, fecha_ultima_mod) VALUES
         ('$evento->idEvento', '$evento->eventoNombre','$evento->estudios',
             '$evento->distribuidora','$evento->fechaEstreno', '$evento->descripcion',
             CURRENT_DATE(),CURRENT_DATE())";
    $conn->query($sql) or die("Error de servidor: SQL error");

    if(isset($evento->generos)){
        foreach($evento->generos as $genero => $idGenero) {
            $squirrel = "INSERT INTO etiquetas (idGenero, idEvento) VALUES ('{$idGenero}','{$evento->idEvento}')";
            $conn->query($squirrel) or die("Error de servidor: SQL error");
        }
    }
}

function  DB_UPDATEevento($conn, $evento) {
    $eventoNombre = mysqli_real_escape_string($conn, $evento->eventoNombre);
    $distribuidora = mysqli_real_escape_string($conn, $evento->distribuidora);
    $estudios = mysqli_real_escape_string($conn, $evento->estudios);
    $descripcion = mysqli_real_escape_string($conn, $evento->descripcion);
    $idEvento = mysqli_real_escape_string($conn, $evento->idEvento);
    $sql = "UPDATE evento SET estudios =  '{$estudios}',
    eventoNombre = '{$eventoNombre}', distribuidora = '{$distribuidora}',
    fechaEstreno = '{$evento->fechaEstreno}', descripcion = '{$descripcion}',
    fecha_ultima_mod = CURRENT_DATE() WHERE idEvento = '{$idEvento}'";
    $conn->query($sql) or die("Error de servidor: SQL error");

    if(isset($evento->generos)){
        $squirrel = "DELETE FROM etiquetas WHERE idEvento = '{$idEvento}';";
        $conn->query($squirrel) or die("Error de servidor: SQL error");
        foreach($evento->generos as $genero => $idGenero) {
            $squirrel = "INSERT INTO etiquetas (idGenero, idEvento) VALUES ('{$idGenero}','{$idEvento}')";
            $conn->query($squirrel) or die("Error de servidor: SQL error");
        }
    }
}


function DB_DROPevento($conn, $idEvento) {
    $id = mysqli_real_escape_string($conn, $idEvento);
    $tablas = array("comentarios","etiquetas","imagen","evento");
    foreach($tablas as $tabla){
        $sql = "DELETE FROM {$tabla} WHERE idEvento = '{$id}'";
        $result = $conn->query($sql) or die("Error de servidor: SQL error");
    }
}

function DB_DROPimagen($conn, $url){
    $id = mysqli_real_escape_string($conn, $url);
    $sql = "DELETE FROM imagen WHERE url = '{$id}'";
}
?>
