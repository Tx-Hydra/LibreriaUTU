<?php
require_once __DIR__ . '/../Models/RepoUsuario.php';
class UsuariosController {
    private $SolicitudUsuario;

    public function __construct(){
        $this->SolicitudUsuario = new RepoUsuario();
    }

    /* Para imprimir los datos en el html */
    public function perfil(){
        Sesion::requerirSesion();
        $usuarioActual = Sesion::usuario();
        $usuario = $this->SolicitudUsuario->obtenerUsuario($usuarioActual['id']);
        require_once __DIR__ . '/../views/Page/ModificarPerfil.php';
    }

    public function ModificarEmail($email){
        Sesion::requerirSesion();
        $usuarioActual = Sesion::usuario();
        $usuario = $this->SolicitudUsuario->obtenerUsuario($usuarioActual['id']);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $usuario->setemail($_POST['correo']);
            $this->SolicitudUsuario->actualizaremail($usuario);
        }
        require_once __DIR__ . '/../views/Page/ModificarPerfil.php';
    }

    public function ModificarClave($clave, $claveNueva){
        Sesion::requerirSesion();
        $usuarioActual = Sesion::usuario();
        $usuario = $this->SolicitudUsuario->obtenerUsuario($usuarioActual['id']);
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            if($clave == $usuarioActual->usuarioActual()['clave']){
                $usuario->setclave($_POST['clave']);
                $this->SolicitudUsuario->actualizarclave($usuario);
            }        
        }
        require_once __DIR__ . '/../views/Page/ModificarPerfil.php';
    }
}
