<?php 

namespace MVC;

class Router{
    
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }


    /** WIP: Checks if the URL is valid and runs its callback function */
    public function comprobarRutas(){
        session_start();
        $auth = $_SESSION['login'] ?? null;
        // paths protected
        $rutas_protegidas =[
            '/admin',
            '/propiedades/crear','/propiedades/actualizar','/propiedades/eliminar',
            '/vendedores/crear','/vendedores/actualizar','/vendedores/eliminar',
            '/entradas/crear','/entradas/actualizar','/entradas/eliminar'
        ];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else{    
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        // protec url paths
        if(in_array($urlActual, $rutas_protegidas) && !$auth){
            header('Location: /');
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