<?php
require_once __DIR__ . '/../Config/Sesion.php';
require_once __DIR__ . '/../Config/Conexion.php';
require_once __DIR__ . '/../Models/RepoLibros.php';

class LibrosController{
    private $SolicitudLibro;

    public function __construct(){
        $this->SolicitudLibro = new RepositorioLibros();
    }

    public function listar(){
        $SolicitudLibro = $this->SolicitudLibro->libros();
        $SolicitudCategoria1 = $this->SolicitudLibro->LibrosCategoria(1); /* Suspenso */
        $SolicitudCategoria2 = $this->SolicitudLibro->LibrosCategoria(2); /* Romanticos */
        $SolicitudCategoria3 = $this->SolicitudLibro->LibrosCategoria(3); /* Ciencia Ficcion */
        $SolicitudCategoria4 = $this->SolicitudLibro->LibrosCategoria(4); /* Aventuras */
        $SolicitudCategoria5 = $this->SolicitudLibro->LibrosCategoria(5); /* Fantasia */ 
        $SolicitudCategoria6 = $this->SolicitudLibro->LibrosCategoria(6); /* Terror */
        $SolicitudCategoria7 = $this->SolicitudLibro->LibrosCategoria(7); /* Paranormal */
        $SolicitudCategoria8 = $this->SolicitudLibro->LibrosCategoria(8); /* Poesia */
        $SolicitudCategoria9 = $this->SolicitudLibro->LibrosCategoria(9); /* Biografias */
        $SolicitudCategoria10 = $this->SolicitudLibro->LibrosCategoria(10); /* Arte */ 
        $SolicitudCategoria11 = $this->SolicitudLibro->LibrosCategoria(11); /* Novelas */ 
        require_once __DIR__ . '/../views/Page/Libros.php';
    }   

    public function listarNuevos($cat = null){
        if($cat == null){
            $SolicitudLibro = $this->SolicitudLibro->ListarCat($cat);
        require_once __DIR__ . '/../views/Page/Libros.php';
        }
    }
    
    public function listarbusqueda(){
        $busqueda = trim($_GET['busqueda'] ?? '');
        if($busqueda === ''){
            header("Location: index.php?controlador=libros&accion=listar");
            exit;
        }
        else{
            $orden = $_GET['orden'] ?? 'recientes';
            $SolicitudLibro = $this->SolicitudLibro->busqueda($busqueda, $orden);
            require_once __DIR__ . '/../views/Page/PaginaBusqueda.php';
        }
    }


    public function DetalleLibro(){
        $id = ($_GET['id'] ?? -1);
        $libro = $this->SolicitudLibro->buscar($id);
        if($libro === null){
            http_response_code(404);
            exit('Libro no Encontrado');
        }
        require_once __DIR__ . '/../views/Page/PaginaLibro.php';
    }


    public function agregar(){
        Sesion::requerirSesion();
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            try{
                $NuevoLibro = new Libros($_POST['nombre'] ?? '',$_POST['autor'] ?? '',(INT)$_POST['anio'] ?? '',$_POST['portada'] ?? '',$_POST['Stock'] ?? 0,(INT)$_POST['isbn'] ?? 0,(float)$_POST['precio'] ?? 0,(INT)$_POST['Codigo_Barras'] ?? 000,$_POST['Descripcion'] ?? '',(int)$_POST['Activo'] ?? 0,(INT)$_POST['Formato_Fisico'] ?? 0,(INT)$_POST['Formato_Digital']?? 0,$_POST['Archivo_Digital']) ?? 0;
                $this->SolicitudLibro->agregar($NuevoLibro);
                header('Location: index.php?controlador=libros&accion=agregar');
                exit;
            }
            catch(Exception $error){
                $mensaje = "Error: ". $error->getMessage();
            }
        }
        $categorias = $this->SolicitudLibro->obtenerCategorias();

        require_once __DIR__ . '/../views/Page/LibroForm.php';
    }


    public function modificarlibro(){
        Sesion::requerirSesion();
        $id = (int)($_GET['id'] ?? 0);
        $libro = $this->SolicitudLibro->buscar($id);
        if ($libro === null){
            http_response_code(404);
            exit('No Se Encontro El Libro');
        }
        require_once __DIR__ . '/../views/Page/EditarLibro.php';
    }

} 