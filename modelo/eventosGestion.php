<?php
function  DB_INevento($conn, $evento) {
    $sql = "INSERT INTO evento (idEvento, estudios, distribuidora, fechaEstreno,
         descripcion, fecha_creacion, fecha_ultima_mod) VALUES
         ('$evento->idEvento','$evento->estudios','$evento->distribuidora',
             '$evento->fechaEstreno', '$evento->descripcion', '$evento->fecha_creacion',
             '$evento->fecha_ultima_mod')";
    $result = $conn->query($sql) or die("Error de servidor: SQL error");
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
    echo $sql;
    $result = $conn->query($sql) or die("Error de servidor: SQL error");
}


function DB_DROPevento($conn, $idEvento) {
    $sql = "DELETE FROM evento WHERE idEvento =" . $idEvento ;
    $result = $conn->query($sql) or die("Error de servidor: SQL error");
}
?>
