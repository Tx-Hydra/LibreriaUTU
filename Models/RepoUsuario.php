<?php
require_once __DIR__ . '../Usuario.php';
require_once __DIR__ . '/../Config/Conexion.php';


class RepoUsuario{
    private $usuario;

    public function __construct(){
        $this->usuario = Conexion::obtener();
    }

    public function autenticar($email, $clave){
        $autenticar = $this->usuario->prepare("SELECT id, correo, clave, nombre, rol, activo FROM usuario WHERE correo = ?;");
        $autenticar->execute([$email]);
        $usuario = $autenticar->fetch();
        
        if(($usuario) && ($clave === $usuario['clave'])){
            return new usuarios($usuario['id'],$usuario['correo'],$usuario['clave'],$usuario['nombre'],$usuario['rol'],$usuario['activo']);
        }

        return null;
    } 

    public function obtenerUsuario($id){
        $consulta = $this->usuario->prepare("SELECT correo, clave, nombre FROM usuario");
        $consulta->execute();
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
        return new usuarios($usuario['id'],$usuario['correo'],$usuario['clave'],$usuario['nombre'],$usuario['rol'],$usuario['activo']);
    }
    
    public function actualizaremail($usuario){
        $consulta = $this->usuario->prepare("UPDATE usuario SET correo = ? WHERE id = ?");
        return $consulta->execute([$usuario->getemail()]);
    }
    public function actualizarclave($usuario){
        $consulta = $this->usuario->prepare("UPDATE usuario SET clave = ? WHERE id = ?");
        return $consulta->execute([$usuario->getclave()]);
    }
    public function actualizarnombre($usuario){
        $consulta = $this->usuario->prepare("UPDATE usuario SET nombre = ? WHERE id = ?");
        return $consulta->execute([$usuario->getnombre()]);
    }
}