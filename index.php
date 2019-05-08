<?php

//Se carga el controlador y modelo
require './controlador/class.php';
require './modelo/modelo.php';
require './controlador/render.php';
require './controlador/comentario.php';
require './controlador/sesiones.php';
//Inicializamos el motor de plantillas
require_once './vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('./directorioTemplates');
$twig = new Twig_Environment($loader, ['cache' => false]); //Cambiar false a './directorioCache para usar la cache'

//Inicializamos la sesion del Usuario
session_start();

definirPermisos();

$conn = DBconnect();

if (array_key_exists("logout",$_GET)) {
    session_unset();
}

if (array_key_exists("exit",$_GET)) {
    echo $twig->render('oops_exito.html');
    exit();
}

if (array_key_exists("infousuario",$_GET)) {
    if(array_key_exists("password_ant",$_POST) && array_key_exists("password_nvo",$_POST) &&
        array_key_exists("usuario",$_SESSION) && !is_null($_SESSION["usuario"]))
    {
        $success = DB_UPDATEpassword($conn, $_SESSION["usuario"], $_POST["password_ant"], $_POST["password_nvo"]);
        renderInfoUsuario($twig, $conn, $success);
    }
    else {
        renderInfoUsuario($twig, $conn, NULL);
    }
    exit();
}

if (array_key_exists("modificar",$_GET) || array_key_exists("aniadir",$_GET)) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                DB_UPDATEevento($conn, $evento);
            }
            else if(array_key_exists("idAniadirEvento",$_POST)){
                $id = strtolower($array["eventoNombre"]);
                $array["idEvento"] = str_replace(" ", "_", $id);
                $array["generos"] = $generos;
                $evento = new Evento($array);
                DB_INevento($conn, $evento);
            }
        }
    }
    if(array_key_exists("modificar",$_GET)) renderModificarEvento($twig, $conn);
    else if(array_key_exists("aniadir",$_GET)) renderAniadirEvento($twig, $conn);
    exit();
}

if (array_key_exists("listado",$_GET)) {
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (array_key_exists("idComentarioBorrar",$_POST)) {
            DB_DROPcomentario($conn, $_POST["idComentarioBorrar"]);
        }
        else if (array_key_exists("idComentarioEditar",$_POST) && array_key_exists("textoComentarioEditar",$_POST)) {
            DB_UPDATEcomentario($conn, $_POST["idComentarioEditar"], $_POST["textoComentarioEditar"]);
        }
        else if (array_key_exists("evento",$_POST)) {
            DB_DROPevento($conn, $_POST["evento"]);
        }
        else if (array_key_exists("usuarioIdRol",$_POST) && array_key_exists("idUsuarioRol",$_POST)) {
            DB_UPDATErol($conn, $_POST["usuarioIdRol"], $_POST["idUsuarioRol"]);
        }
    }
    renderListado($twig, $conn);
    exit();
}

if (array_key_exists("identificarse",$_GET)) {
    $error = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        iniciarSesion($conn);
        $error = true;
    }
    if (!array_key_exists("usuario",$_SESSION) || is_null($_SESSION["usuario"])) {
        renderIdentificarse($twig, $conn, $error);
        mysqli_close($conn);
        exit();
    }
}
if (array_key_exists("registrarse",$_GET)) {
    $error = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        registrarse($conn);
        $error = true;
    }
    if (!array_key_exists("usuario",$_SESSION) || is_null($_SESSION["usuario"])) {
        renderRegistrarse($twig, $conn, $error);
        mysqli_close($conn);
        exit();
    }
}

if (array_key_exists("evento",$_GET)) {
    if (array_key_exists("fb_tw",$_GET)) {
        renderFB_TW($twig, $conn);
        exit();
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(array_key_exists("idComentarioBorrar",$_POST)){
            DB_DROPcomentario($conn, $_POST["idComentarioBorrar"]);
        }
        else if (array_key_exists("idComentarioEditar",$_POST) && array_key_exists("textoComentarioEditar",$_POST)) {
            DB_UPDATEcomentario($conn, $_POST["idComentarioEditar"], $_POST["textoComentarioEditar"]);
        }
        else if(array_key_exists("idFotoBorrar",$_POST)){
            DB_DROPimagen($conn, $_POST["idFotoBorrar"]);
        }
        else if(array_key_exists("idFotoDescripcion",$_POST)){
            DB_INimagen($conn, $_GET['evento'], $_POST["idFotoDescripcion"]);
        }
        else if(checkPermiso($conn, PERMISO_COMENTAR) && array_key_exists("comentario",$_POST)) {
            comentar($conn, $_GET['evento']);
        }
    }
    renderEvento($twig, $conn);
    mysqli_close($conn);
    exit();
}

else if (array_key_exists("pagina",$_GET)) {
    renderGenerica($twig, $conn);
    mysqli_close($conn);
    exit();
}
else if (array_key_exists("genero",$_GET)) {
    renderPorGenero($twig, $conn);
    mysqli_close($conn);
    exit();
}
else{
    renderPrincipal($twig, $conn);
    mysqli_close($conn);
    exit();
}

exit();
?>
