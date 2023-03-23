<?php 

namespace MVC;

class Router{
    
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    /** WIP: Checks if the URL is valid and runs its callback function */
    public function comprobarRutas(){
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }

        if($fn){
            call_user_func($fn, $this);
        }else{
            echo "Página No Encontrada";
        }
    }

    /** Renders a view */
    public function render($view, $datos = []){
        
        // passing every attribute to the view
        foreach($datos as $key => $value){
            $$key = $value;
        }

        ob_start();

        include_once __DIR__ . "/views/$view.php";
    
        $contenido = ob_get_clean();

        include_once __DIR__ . "/views/layout.php";
    }
}