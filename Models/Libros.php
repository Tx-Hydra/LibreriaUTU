<?php

class Libros{
    private $id;
    private $titulo;
    private $autor;
    private $anio; 
    private $portada;
    private $stock;
    private $isbn;
    private $precio;
    private $codigo_barras;
    private $descripcion;
    private $activo;
    private $formato_fisico;
    private $formato_digital;
    private $archivo_digital; 
    private $preciooferta;
    
    public function __construct($titulo,$autor,$anio,$portada,$stock,$isbn,$precio, $preciooferta,$codigo_barras,$descripcion,$activo,$formato_fisico,$formato_digital,$archivo_digital) {
        if ($titulo === "" || $autor === "" || $anio === "" || $anio === "" || $portada === "" || $stock === "" || $isbn === "" || $precio === "" || $codigo_barras === "" || $descripcion === "" || $activo === "" || $formato_fisico === "" || $formato_digital === "" || $archivo_digital === "")
            throw new Exception("Faltan Datos por Completar");
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->anio = $anio;
        $this->portada = $portada;
        $this->stock = $stock;
        $this->isbn = $isbn;
        $this->precio = $precio;
        $this->codigo_barras = $codigo_barras;
        $this->descripcion = $descripcion;
        $this->activo = $activo;
        $this->$formato_fisico = $formato_fisico;
        $this->formato_digital = $formato_digital;
        $this->archivo_digital = $archivo_digital;
        $this->preciooferta = $preciooferta;
    }
    public function setid($id){$this->id = $id;}
    public function getid(){return $this->id;}
    public function gettitulo(){return $this->titulo;}
    public function getautor(){return $this->autor;}
    public function getanio(){return $this->anio;}
    public function getportada(){return $this->portada;}
    public function getstock(){return $this->stock;}
    public function getisbn(){return $this->isbn;}
    public function getprecio(){return $this->precio;}
    public function getpreciooferta(){ return $this->preciooferta;}
    public function getcodbarras(){return $this->codigo_barras;}
    public function getdescripcion(){return $this->descripcion;}
    public function getactivo(){return $this->activo;}
    public function getformatofisico(){return $this->formato_fisico;}
    public function getformatodigital(){return $this->formato_digital;}
    public function getarchivodigital(){return $this->archivo_digital;}


    public function settitulo($titulo){ $this->titulo = $titulo;}
    public function setautor($autor){$this->autor = $autor;}
    public function setstock($stock){$this->stock = $stock;}
    public function setprecio($precio){$this->precio = $precio;}
    public function setpreciooferta($preciooferta){$this->preciooferta = $preciooferta;}

    public function __toString() {
        return htmlspecialchars($this->titulo) . " - $" . number_format($this->precio, 2, ',', '.');
    }
}