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
    return true;
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
    return true;
}


function DB_DROPevento($conn, $idEvento) {
    $id = mysqli_real_escape_string($conn, $idEvento);
    $tablas = array("comentarios","etiquetas","imagen","evento");
    foreach($tablas as $tabla){
        $sql = "DELETE FROM {$tabla} WHERE idEvento = '{$id}'";
        $result = $conn->query($sql) or die("Error de servidor: SQL error");
    }
    return true;
}

function DB_DROPimagen($conn, $url){
    $id = mysqli_real_escape_string($conn, $url);

    $sql = "SELECT * FROM imagen WHERE url = '{$id}'";
    $result = $conn->query($sql) or die("Error de servidor: SQL error");
    if($result->num_rows == 0) die("Error de servidor: Archivo no existente");
    $sql = "DELETE FROM imagen WHERE url = '{$id}'";
    $conn->query($sql) or die("Error de servidor: SQL error");
    unlink($url);
    return true;
}

function DB_INimagen($conn, $idEvento, $descripcion, $portada){
    $dir_subida = "./imgs/{$idEvento}/";
    if(!$portada) $fichero_subido = $dir_subida . basename($_FILES['fichero_usuario']['name']);
    else{
        $fichero_subido = $dir_subida . 'portada.jpg';
        if (!file_exists("./imgs/{$idEvento}/")) {
            mkdir("./imgs/{$idEvento}/", 0777, true) or die("Error de servidor: No se ha podido crear la carpeta");
        }
    }
    if(move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)){
        //Exitoso
    }
    else {
        echo $twig->render('oops.html');
        exit();
    }

    $evento = mysqli_real_escape_string($conn, $idEvento);
    $texto = mysqli_real_escape_string($conn, $descripcion);
    $sql = "INSERT INTO imagen (idEvento, url, descripcion) VALUES ('$evento', '$fichero_subido', '$texto')";
    $conn->query($sql) or die("Error de servidor: SQL error");
    return true;
}

?>
