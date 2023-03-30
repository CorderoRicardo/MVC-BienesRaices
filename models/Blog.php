<?php 

namespace Model;

class Blog extends ActiveRecord{
    protected static $tabla = 'entradas';
    protected static $columnasDB = ['id','titulo','imagen','contenido','creado','autor']; 

    public $id;
    public $titulo;
    public $imagen;
    public $contenido;
    public $creado;
    public $autor;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->contenido = $args['contenido'] ?? '';
        $this->creado = date('Y/m/d');
        $this->autor = $args['autor'] ?? '';        
    }

    public function validar()
    {
        
    }
}