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
        require_once __DIR__ . '/../views/Page/modificarlibro.php';
    }

    public function enviarModificacion(){
        Sesion::requerirSesion();
        $id = $_GET['id'];
        $libro = $this->SolicitudLibro->buscar($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            try{
                $titulo = trim($_POST['nombre'] ?? '') !== '' ? $_POST['nombre'] : $libro->gettitulo();
                $autor = trim($_POST['autor'] ?? '') !== '' ? $_POST['autor'] : $libro->getautor();
                $anio = ($_POST['anio'] ?? '') !== '' ? (int)$_POST['anio'] : $libro->getAnio(); 
                $portada = ($_POST['portada'] ?? '') !== '' ? (int)$_POST['portada'] : "LibrosImagenes/".$libro->getportada(); 
                $stock = ($_POST['Stock'] ?? '') !== ''? (int)$_POST['Stock'] : $libro->getStock();
                $isbn = ($_POST['isbn'] ?? '') !== ''? (int)$_POST['isbn'] : $libro->getisbn();
                $precio = ($_POST['precio'] ?? '') !== '' ? (float)$_POST['precio'] : $libro->getPrecio();
                $preciooferta =  ($_POST['preciooferta'] ?? '') !== '' ? (float)$_POST['preciooferta'] : $libro->getPreciooferta();
                $codigobarras = ($_POST['codigobarras'] ?? '') !== '' ? (float)$_POST['codigobarras'] : $libro->getcodbarras();
                $descripcion = ($_POST['descripcion'] ?? '') !== '' ? (float)$_POST['descripcion'] : $libro->getdescripcion();
                $activo = ($_POST['activo'] ?? '') !== '' ? (float)$_POST['activo'] : $libro->getactivo();
                $formatofisico = ($_POST['formato_fisico'] ?? '') !== '' ? (float)$_POST['formato_fisico'] : $libro->getformatofisico();
                $formatodigital = ($_POST['formato_digital'] ?? '') !== '' ? (float)$_POST['formato_digital'] : $libro->getformatodigital();
                $archivodigital = ($_POST['archivo_digital'] ?? '') !== '' ? (float)$_POST['archivo_digital'] : $libro->getarchivodigital();

                $libromodificado = new Libros($titulo,$autor,$anio,$portada,$stock,$isbn,$precio,$preciooferta,$codigobarras,$descripcion,$activo,$formatofisico,$formatodigital,$archivodigital);
                $respuesta = $this->SolicitudLibro->editar($libromodificado,$id);
                if($respuesta){
                    header("Location: index.php/controlador=libros?accion=DetalleLibro&id=".$id);
                    exit;
                }
            }
            catch(Exception $error){
                $mensaje = "Error: ". $error->getMessage();
                header("Location: index.php/controlador=libros?accion=DetalleLibro&id=".$id);
                    exit;
            }
        }
    } 

}