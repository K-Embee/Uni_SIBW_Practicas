<?php

function comentar($conn, $evento) {
    $nombre = $email = $email_err = $comentario = "";
    $name = $_SESSION["usuario"]->nombre; //test_input($_POST["name"]);
    $email = $_SESSION["usuario"]->email; //test_input($_POST["email"]);
    $comentario = test_input($_POST["comentario"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
    }

    $palabras_prohibidas = DBcensura($conn);
    $comentario = censura($comentario, $palabras_prohibidas);
    $ip = $_SERVER['REMOTE_ADDR'];

    if($name && !$email_err && $comentario) {
        $array = array();
        $array["idComentario"] = "";
        $array["idEvento"] = $evento;
        $array["ip"] = $ip;
        $array["nombre"] = $name;
        $array["correo"] = $email;
        $array["fecha_hora"] = "";
        $array["texto"] = $comentario;
        $comm  = new Comentario($array);
        DB_INcomentario($conn, $comm);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function censura($data, $palabras) {
    foreach ($palabras as $x) {
        $data = str_ireplace($x, str_repeat('*', strlen($x)), $data);
    }
    return $data;
}

?>
