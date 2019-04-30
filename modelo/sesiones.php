<?php
function DBlogin($conn, $email, $password) {
    $sql = "SELECT * FROM usuario WHERE email=" . '\'' . $email . '\'';
    $result = $conn->query($sql);

    $var = NULL;

    if($row = $result->fetch_assoc()){
        $var = new Usuario($row);
    }
    return $var;
}

function DB_INregister($conn, $email, $password, $nombreUsuario, $nombre) {
    $sql = "INSERT INTO usuario (nombre, email, contraseña, idUsuario) VALUES
        ('$nombre', '$email', '$password', '$nombreUsuario')";
    $result = $conn->query($sql) or die("Error de servidor: SQL error");
}


?>
