<?php
function DBlogin($conn, $email, $password) {
    $sql = "SELECT * FROM usuario WHERE email=" . '\'' . $email . '\'';
    $result = $conn->query($sql);

    $var = NULL;

    if($row = $result->fetch_assoc()){
        $var = new Usuario($row);
    }

    if($var && !password_verify($password, $var->contraseña)) {
        $var = NULL;
    }

    return $var;
}

function DB_UPDATEpassword($conn, $user, $pass_a, $pass_n) {
    $pass_a = password_hash($pass_a, PASSWORD_BCRYPT);
    if(password_verify($pass_n, $user->contraseña) && password_verify($pass_n, $pass_a)) {
        $pass_n = password_hash($pass_n, PASSWORD_BCRYPT);
        $sql = "UPDATE usuario SET password = '{$pass_n}' WHERE email = '{$user->email}'";
        $result = $conn->query($sql);

        return ($result->fetch_assoc()) ? true : false; //fetch_assoc devuelve una fila si hay algo o falso si no hay nada
    }
    return false;
}

function DB_INregister($conn, $email, $password, $nombreUsuario, $nombre) {
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO usuario (nombre, email, contraseña, idUsuario) VALUES
        ('$nombre', '$email', '$password', '$nombreUsuario')";
    $result = $conn->query($sql);
}


?>
