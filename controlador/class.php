<?php
class Evento {
    public $eventoNombre;
    public $estudios;
    public $distribuidora;
    public $descripcion;
    public $idEvento;
    public $fechaEstreno;
    public $fecha_creacion;
    public $fecha_ultima_mod;
    public $enlace_twitter;
    public $enlace_fb;
    public $publicado;
    public $generos;
    function Evento ($array) {
        if(array_key_exists("eventoNombre",$array)) $this->eventoNombre = $array["eventoNombre"];
        if(array_key_exists("estudios",$array)) $this->estudios = $array["estudios"];
        if(array_key_exists("distribuidora",$array)) $this->distribuidora = $array["distribuidora"];
        if(array_key_exists("descripcion",$array)) $this->descripcion = $array["descripcion"];
        if(array_key_exists("idEvento",$array)) $this->idEvento = $array["idEvento"];
        if(array_key_exists("fechaEstreno",$array)) $this->fechaEstreno = $array["fechaEstreno"];
        if(array_key_exists("fecha_creacion",$array)) $this->fecha_creacion = $array["fecha_creacion"];
        if(array_key_exists("fecha_ultima_mod",$array)) $this->fecha_ultima_mod = $array["fecha_ultima_mod"];
        if(array_key_exists("enlace_twitter",$array)) $this->enlace_twitter = $array["enlace_twitter"];
        if(array_key_exists("enlace_fb",$array)) $this->enlace_fb = $array["enlace_fb"];
        if(array_key_exists("publicado",$array)) $this->publicado = $array["publicado"];
        if(array_key_exists("generos",$array)) $this->generos = $array["generos"];
    }
}

class Imagen {
    public $url;
    public $descripcion;
    public $idEvento;
    function Imagen ($array) {
        $this->url = $array["url"];
        $this->descripcion = $array["descripcion"];
        $this->idEvento = $array["idEvento"];
    }
}

class Video {
    public $url;
    public $idEvento;
    function Video ($array) {
        $this->url = $array["url"];
        $this->idEvento = $array["idEvento"];
    }
}

class Comentario {
    public $idEvento;
    public $idComentario;
    public $ip;
    public $nombre;
    public $correo;
    public $fecha_hora;
    public $texto;
    function Comentario ($array) {
        $this->idEvento = $array["idEvento"];
        $this->idComentario = $array["idComentario"];
        $this->ip = $array["ip"];
        $this->nombre = $array["nombre"];
        $this->correo = $array["correo"];
        $this->fecha_hora = $array["fecha_hora"];
        $this->texto = $array["texto"];
    }
}

class Usuario{
    public $nombre;
    public $email;
    public $contraseña;
    public $idUsuario;
    public $idRol;
    function Usuario($array) {
        $this->nombre = $array["nombre"];
        $this->email = $array["email"];
        $this->contraseña = $array["contraseña"];
        $this->idUsuario = $array["idUsuario"];
        $this->idRol = $array["idRol"];
    }
}
?>
