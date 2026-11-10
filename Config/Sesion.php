<?php
class Sesion{
    public static function iniciar(){
        if (session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params([
                'httponly' => true,
                'samesite' => 'Lax'
            ]);
            session_start();
        }
    }

    public static function login(usuarios $u){
        self::iniciar();
        session_regenerate_id(true);

        $_SESSION['usuarios'] = [
            'id'     => $u->getId(),
            'nombre' => $u->getNomb(),
            'rol'    => $u->getRol(),
        ];
    }

    public static function usuario(){
        self::iniciar();
        return $_SESSION['usuarios'] ?? null;
    }

    public static function estaLogueado(){
        self::iniciar();
        return isset($_SESSION['usuarios']);
    }

    public static function logout(){
        $_SESSION = [];
        session_destroy();
    }

    public static function requerirSesion(){
        if (!self::estaLogueado()) {
            header('Location: index.php?controlador=auth&accion=login');
            exit;
        }
    }
}