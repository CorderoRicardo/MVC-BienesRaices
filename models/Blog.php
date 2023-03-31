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
        if(!$this->titulo){
            self::$errores[] = 'El Titulo es obligatorio';
        }
        if(!$this->autor){
            self::$errores[] = 'El autor es obligatorio';
        }    
        if(strlen($this->contenido) < 150){
            self::$errores[] = 'La contenido es obligatorio y debe tener al menos 150 caracteres';
        }
        if(!$this->imagen){
            self::$errores[] = 'La imagen es obligatoria';
        }
        return self::getErrores();                 
    }

    public function borrarImagen(){
        $existeArchivo = file_exists(CARPETA_IMAGENES .'entradas/'. $this->imagen);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES .'entradas/'. $this->imagen);
        }
    }    
}