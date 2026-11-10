<?php
require_once __DIR__ . '/../Config/Sesion.php';
require_once __DIR__ . '/../Config/Conexion.php';
require_once __DIR__ . '/../Models/RepoUsuario.php';

class AuthController{
    private $SolicitudUsuario;

    public function __construct(){
        $this->SolicitudUsuario = new RepoUsuario();
    }

    public function login(){
        $error = '';
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            
            $email = $_POST['email'] ?? '';
            $clave = $_POST['clave'] ?? '';
            $usuario = $this->SolicitudUsuario->autenticar($email,$clave);
            
            if ($usuario !== null) {
                Sesion::login($usuario);
                header('Location: index.php?controlador=libros&accion=listar');
                exit;
            }  
            $error = 'Email o Clave Incorrectos';
        }
        require_once __DIR__ .'/../views/Page/Login.php';
    }

    public function LogOut(){
        Sesion::logout();
        header('Location: inicio');
        exit;
    }
}