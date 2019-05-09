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

//Obtiene si un usuario tiene un permiso o no
function DBpermiso($conn, $permiso, $rol) {
    $sql = "SELECT * FROM permisos WHERE idRol = '{$rol}' AND idPermiso = {$permiso}";
    $result = $conn->query($sql) or die("Error de servidor: SQL error");
    if($row = $result->fetch_assoc()){
        return true;
    }
    return false;
}

function DB_UPDATEpassword($conn, $user, $pass_a, $pass_n) {
    if(password_verify($pass_a, $user->contraseña)) {
        $pass_n = password_hash($pass_n, PASSWORD_BCRYPT);
        $sql = "UPDATE usuario SET contraseña = '{$pass_n}' WHERE idUsuario = '{$user->idUsuario}'";
        $result = $conn->query($sql);
        if($result){
            $user->contraseña = $pass_n;
        }

        return true;
    }
    return false;
}

function DB_UPDATEusuario($conn, $user, $nombre, $email) {
    $nombre = mysqli_real_escape_string($conn, $nombre);
    $email = mysqli_real_escape_string($conn, $email);
    $sql = "UPDATE usuario SET nombre = '{$nombre}', email = '{$email}' WHERE idUsuario = '{$user->idUsuario}'";
    $result = $conn->query($sql);
    if($result){
        return true;
    }
    return false;
}


function DB_INregister($conn, $email, $password, $nombreUsuario, $nombre) {
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO usuario (nombre, email, contraseña, idUsuario, idRol) VALUES
        ('$nombre', '$email', '$password', '$nombreUsuario', 'usuario')";
    $result = $conn->query($sql);
    if($result){
        return true;
    }
    return false;
}


?>
