<?php

// Defines de permisos.
function definirPermisos(){
    define("PERMISO_COMENTAR", 0);
    define("PERMISO_MODERACION_COMENTARIOS", 1);
    define("PERMISO_GESTION_EVENTOS", 2);
    define("PERMISO_MODIFICAR_GALERIA", 3);
    define("PERMISO_SUPERUSUARIO", 4);
}

function checkPermiso($conn, $pag_error, $permiso) {
    $tiene_permiso = true;
    if(!array_key_exists("usuario",$_SESSION) || is_null($_SESSION["usuario"])) {
        $tiene_permiso = false;
    }
    else if(!DBpermiso($conn, $permiso, $_SESSION["usuario"]->idRol)){
        $tiene_permiso = false;
    }

    if(is_null($pag_error) || $tiene_permiso) {
        return $tiene_permiso;
    }
    echo $pag_error->render('oops_perms.html');
    exit();
}

//Inicio de sesión y registro
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
        return false;
    }

    return DB_INregister($conn,$email,$password,$nombreUsuario,$nombre);
}
?>
