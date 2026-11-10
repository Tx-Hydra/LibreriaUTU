<?php
require_once __DIR__ . '/Config/Sesion.php';
Sesion::iniciar();

$controladores = [
    'auth' => 'AuthController',
    'libros' => 'LibrosController',
    'perfil' => 'UsuariosController'
];

$nombre = $_GET['controlador'] ?? 'libros';
$accion = $_GET['accion'] ?? 'listar';

if (!isset($controladores[$nombre])){
    http_response_code(404);
    exit('Controlador no Encontrado: '. htmlspecialchars($nombre));
}

$clase = $controladores[$nombre];
require_once __DIR__ . '/Controls/'.$clase.'.php';

try{
    
    $controlador = new $clase();
    if(!method_exists($controlador,$accion)){
        http_response_code(404);
        exit('Accion no Encontrada: '. htmlspecialchars($accion));
    }
    $controlador->$accion();
}
catch (PDOException $e) {
    http_response_code(500);
    exit('Error SQL: ' . $e->getMessage());
}