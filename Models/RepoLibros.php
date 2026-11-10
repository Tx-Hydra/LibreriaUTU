<?php
require_once __DIR__ . '/../Config/Sesion.php';
Sesion::iniciar();
require_once __DIR__ . '/../Config/Conexion.php';
require_once __DIR__ . '/../Models/Libros.php';


class RepositorioLibros {
    private $libros;

    public function __construct() {
        $this->libros = Conexion::obtener();
    }

    public function agregar(Libros $p){
        $stmt = $this->libros->prepare("INSERT INTO libro(titulo, autor, anio, portada, stock, isbn, precio, preciooferta, codigo_barras, descripcion, activo, formato_fisico, formato_digital, archivo_digital) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)");
        $stmt->execute([$p->gettitulo(), $p->getautor(), $p->getanio(), $p->getportada(),$p->getstock(),$p->getisbn(),$p->getprecio(),$p->getpreciooferta() ,$p->getcodbarras(),$p->getdescripcion(),$p->getactivo(),$p->getformatofisico(),$p->getformatodigital(),$p->getarchivodigital()]);
        $p->setId($this->libros->lastInsertId());
    }

    public function libros(){
        $libro = $this->libros->query("SELECT * FROM libro ORDER BY id DESC LIMIT 15")->FetchAll();
        $libros = [];
        foreach ($libro as $l) {
            $libros[] = $this->aObjeto($l);   
        }
        return $libros;
    }

    public function LibrosCategoria($cat){
        $consulta = $this->libros->prepare("SELECT l.* FROM libro l INNER JOIN libro_categoria lc ON l.id = lc.id_libro WHERE lc.id_categoria = :cat ORDER BY l.id DESC LIMIT 15");
        $consulta->bindValue(':cat', $cat, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $libros = [];
        foreach ($resultado as $l) {
            $libros[] = $this->aObjeto($l);
    }
    return $libros;
}
    
    public function buscar($id){
        $stmt = $this->libros->prepare("SELECT * FROM libro  WHERE id = ?");
        $stmt->execute([$id]);
        $libro = $stmt->fetch();
        return $libro ? $this->aObjeto($libro) : null;
    }

    public function obtenerCategorias(){
        $cat = $this->libros->prepare("SELECT id, categoria FROM categorias ORDER BY id");
        $cat->execute();
        return $cat->fetchall(PDO::FETCH_ASSOC);
    }

    public function busqueda($busqueda, $orden = 'recientes') {
        $ordenSQL = match($orden) {
            'precio_asc'  => 'precio ASC',
            'precio_desc' => 'precio DESC',
            'autor'       => 'autor ASC',
            default       => 'id DESC'
        };
        $stmt = $this->libros->prepare(
            "SELECT * FROM libro
            WHERE titulo LIKE ? OR autor LIKE ?
            ORDER BY $ordenSQL"
        );
        $texto = "%" . $busqueda . "%";
        $stmt->execute([$texto, $texto]);
        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $resultados = [];
        foreach ($libros as $libro) {
            $resultados[] = $this->aObjeto($libro);
        }
        return $resultados;
    }

    private function aObjeto($lib){
        $l = new Libros($lib['titulo'], $lib['autor'], $lib['anio'], $lib['portada'],$lib['stock'],$lib['isbn'],$lib['precio'],$lib['preciooferta'],$lib['codigo_barras'],$lib['descripcion'],$lib['activo'],$lib['formato_fisico'],$lib['formato_digital'],$lib['archivo_digital']);
        $l->setid((int) $lib['id']);
        return $l;
    }
} 