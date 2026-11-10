<?php
class usuarios{
    private $id;
    private $email;
    private $clave;
    private $nombre;
    private $rol;
    private $activo;

    public function __construct($id, $email, $clave, $nombre, $rol, $activo){
        $this->id = $id;
        $this->email = $email;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->rol = $rol;
        $this->activo = $activo;
    }

    public function getid(){return $this->id;}
    public function getnomb(){return $this->nombre;}
    public function getemail(){return $this->email;}
    public function getclave(){return $this->clave;}
    public function getrol(){return $this->rol;}
    public function getactivo(){return $this->activo;}

    public function setid($id){$this->id = $id;}
    public function setemail($emailnuevo){$this->email = $emailnuevo;}
    public function setclave($nuevaclave){$this->clave = $nuevaclave;}
    public function setnombre($nuevonombre){$this->nombre = $nuevonombre;}
}