<?php
function funcionEvento($twig, $conn){
    $success = NULL;
    if (array_key_exists("fb_tw",$_GET)) {
        renderFB_TW($twig, $conn);
        exit();
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(array_key_exists("idComentarioBorrar",$_POST) && checkPermiso($conn, $twig, PERMISO_MODERACION_COMENTARIOS)){
            DB_DROPcomentario($conn, $_POST["idComentarioBorrar"]);
        }
        else if (array_key_exists("idComentarioEditar",$_POST) && array_key_exists("textoComentarioEditar",$_POST) && checkPermiso($conn, $twig, PERMISO_MODERACION_COMENTARIOS)) {
            DB_UPDATEcomentario($conn, $_POST["idComentarioEditar"], $_POST["textoComentarioEditar"]);
        }
        else if(array_key_exists("idFotoBorrar",$_POST) && checkPermiso($conn, $twig, PERMISO_MODIFICAR_GALERIA)){
            $success = DB_DROPimagen($conn, $_POST["idFotoBorrar"]);
        }
        else if(array_key_exists("idFotoDescripcion",$_POST) && checkPermiso($conn, $twig, PERMISO_MODIFICAR_GALERIA)){
            $success = DB_INimagen($conn, $_GET['evento'], $_POST["idFotoDescripcion"], false);
        }
        else if(array_key_exists("comentario",$_POST) && checkPermiso($conn, $twig, PERMISO_COMENTAR)) {
            comentar($conn, $_GET['evento']);
        }
    }

    $permiso_editar_galeria = checkPermiso($conn, NULL, PERMISO_MODIFICAR_GALERIA);

    renderEvento($twig, $conn, $success, $permiso_editar_galeria);
    mysqli_close($conn);
    exit();
}

function funcionQuery($twig, $conn){
    $query = $_REQUEST["q"];
    $array_final = Array();
    $permisos = checkPermiso($conn, null, PERMISO_GESTION_EVENTOS);

    if($_GET["listado"] == "eventos") {
        $array = DBprincipal($conn);
        foreach($array as $evento) {
            $evento->generos = DBeventoGenero($conn, $evento->idEvento);
        }
        foreach ($array as $evento) {
            if($query == "" || stripos($evento->eventoNombre, $query) !== false || stripos($evento->descripcion, $query) !== false) {
                array_push($array_final, $evento);
            }
        }
        $echo = $twig->render('listadoEventos.html', ['lista' => $array_final, 'admin' => $permisos]);

        //Resaltado
        $buscable_regex = "/\<span class=\"buscable\"\>*\<\/span\>";
        $query_regex = "/{$query}/gi";
        $matches = Array();
        preg_match_all ( "/<span class=\"buscable\">(.*)<\/span>/i" , $echo, $matches, PREG_OFFSET_CAPTURE);

        foreach ($matches as $index => $match) {
            if($index == 0) continue;
            $new_match = preg_replace($query, "<span class=\"highlight\">".$query."</span>", $match[0]);
            $var = preg_replace($match[0], $new_match, $var);
        }
        echo $echo;
    }
    else if($_GET["listado"] == "comentarios") {
        $array = DBtodosComentarios($conn);
        foreach ($array as $comentario) {
            if($query == "" || stripos($comentario->texto, $query) !== false || stripos($comentario->nombre, $query) !== false) {
                array_push($array_final, $comentario);
            }
        }
        echo $twig->render('listadoComentarios.html', ['lista' => $array_final, 'admin' => $permisos]);
    }
    else {
        echo $twig->render('oops.html');
    }

    exit();
}

function funcionListado($twig, $conn) {
    $success = NULL;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (array_key_exists("idComentarioBorrar",$_POST) && checkPermiso($conn, $twig, PERMISO_MODERACION_COMENTARIOS)) {
            $success = DB_DROPcomentario($conn, $_POST["idComentarioBorrar"]);
        }
        else if (array_key_exists("idComentarioEditar",$_POST) && array_key_exists("textoComentarioEditar",$_POST) && checkPermiso($conn, $twig, PERMISO_MODERACION_COMENTARIOS)) {
            $success = DB_UPDATEcomentario($conn, $_POST["idComentarioEditar"], $_POST["textoComentarioEditar"]);
        }
        else if (array_key_exists("evento",$_POST) && checkPermiso($conn, $twig, PERMISO_GESTION_EVENTOS)) {
            $success = DB_DROPevento($conn, $_POST["evento"]);
        }
        else if (array_key_exists("usuarioIdRol",$_POST) && array_key_exists("idUsuarioRol",$_POST) && checkPermiso($conn, $twig, PERMISO_SUPERUSUARIO)) {
            $success = DB_UPDATErol($conn, $_POST["usuarioIdRol"], $_POST["idUsuarioRol"]);
        }
    }

    $listado = $_GET["listado"];

    switch ($listado) {
        case 'usuarios':
            checkPermiso($conn, $twig, PERMISO_SUPERUSUARIO);
            break;
        case 'comentarios':
            checkPermiso($conn, $twig, PERMISO_MODERACION_COMENTARIOS);
            break;
        case 'eventos':
            //checkPermiso($conn, $twig, PERMISO_GESTION_EVENTOS);
            break;
    }

    renderListado($twig, $conn, $success);
    exit();
}

function funcionAlterarEvento($twig, $conn) {
    $success = NULL;
    if ($_SERVER["REQUEST_METHOD"] == "POST" && checkPermiso($conn, $twig, PERMISO_GESTION_EVENTOS)) {
        if(array_key_exists("eventoNombre",$_POST) && array_key_exists("estudios",$_POST) && array_key_exists("distribuidora",$_POST) &&
            array_key_exists("fechaEstreno",$_POST) && array_key_exists("descripcion",$_POST))
        {
            $generos = DBlistadoGenero($conn, false);
            $array = array();
            $array["eventoNombre"] = $_POST["eventoNombre"];
            $array["estudios"] = $_POST["estudios"];
            $array["distribuidora"] = $_POST["distribuidora"];
            $array["descripcion"] = $_POST["descripcion"];
            $array["fechaEstreno"] = $_POST["fechaEstreno"];
            foreach($generos as $genero => $idGenero) {
                if(!array_key_exists("genero_{$idGenero}",$_POST)) {
                    unset($generos[$genero]);
                }
            }
            if(array_key_exists("idModificarEvento",$_POST)) {
                $array["idEvento"] = $_POST["idModificarEvento"];
                $array["generos"] = $generos;
                $evento = new Evento($array);
                $success = DB_UPDATEevento($conn, $evento);
            }
            else if(array_key_exists("idAniadirEvento",$_POST)){
                $id = strtolower($array["eventoNombre"]);
                $array["idEvento"] = str_replace(" ", "_", $id);
                $array["generos"] = $generos;
                $evento = new Evento($array);
                if(array_key_exists("fichero_usuario",$_FILES) && checkPermiso($conn, $twig, PERMISO_MODIFICAR_GALERIA)){
                    $success = DB_INevento($conn, $evento);
                    DB_INimagen($conn, $array["idEvento"], "Portada", true);
                }
            }
        }
    }
    if(array_key_exists("modificar",$_GET)) renderModificarEvento($twig, $conn, $success);
    else if(array_key_exists("aniadir",$_GET)) renderAniadirEvento($twig, $conn, $success);
    else echo $twig->render('oops.html');
    exit();
}

function funcionInfoUsuario($twig, $conn) {
    if(array_key_exists("password_ant",$_POST) && array_key_exists("password_nvo",$_POST) &&
        array_key_exists("usuario",$_SESSION) && !is_null($_SESSION["usuario"]))
    {
        $success = DB_UPDATEpassword($conn, $_SESSION["usuario"], $_POST["password_ant"], $_POST["password_nvo"]);
        renderInfoUsuario($twig, $conn, $success);
    }
    else if(array_key_exists("UsuarioNombreCambiado",$_POST) && array_key_exists("UsuarioEmailCambiado",$_POST) &&
        array_key_exists("usuario",$_SESSION) && !is_null($_SESSION["usuario"])){
        $success = DB_UPDATEusuario($conn, $_SESSION["usuario"], $_POST["UsuarioNombreCambiado"], $_POST["UsuarioEmailCambiado"]);
        renderInfoUsuario($twig, $conn, $success);
    }
    else if(array_key_exists("usuario",$_SESSION) && !is_null($_SESSION["usuario"])){
        renderInfoUsuario($twig, $conn, NULL);
    }
    else {
        echo $twig->render('oops.html');
    }
    exit();
}

?>
