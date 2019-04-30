<?php

function iniciarSesion($conn) {
    $email = $email_err = $password = "";
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
    }

    if(!$email_err) {
        $usuario = DBlogin($conn, $email, $password);
        if($usuario) {
            $_SESSION["usuario"] = $usuario;
            echo "echo";
            echo $_SESSION["usuario"]->idUsuario;
        }
    }
}

function registrarse($conn) {
    $nombre = $email = $email_err = $password = $nombreUsuario = "";
    $nombre = test_input($_POST["nombre"]);
    $nombreUsuario = test_input($_POST["nombreUsuario"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
    }

    DB_INregister($conn,$email,$password,$nombreUsuario,$nombre);
}
?>
