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
    function Evento ($array) {
        $this->eventoNombre = $array["eventoNombre"];
        $this->estudios = $array["estudios"];
        $this->distribuidora = $array["distribuidora"];
        $this->descripcion = $array["descripcion"];
        $this->idEvento = $array["idEvento"];
        $this->fechaEstreno = $array["fechaEstreno"];
        $this->fecha_creacion = $array["fecha_creacion"];
        $this->fecha_ultima_mod = $array["fecha_ultima_mod"];
        $this->enlace_twitter = $array["enlace_twitter"];
        $this->enlace_fb = $array["enlace_fb"];
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
    //public $idComentario;
    public $idEvento;
    public $idComentario;
    public $ip;
    public $nombre;
    public $correo;
    public $fecha_hora;
    public $texto;
    function Comentario ($array) {
        //$this->idComentario = $array["idComentario"];
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
