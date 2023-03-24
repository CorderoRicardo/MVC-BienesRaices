<?php 

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

class PropiedadController{
    public static function index(Router $router){
        // The model interacts with the DB and gets the data
        $propiedades = Propiedad::all();
        $resultado = null;

        $router->render('propiedades/admin',[
            // The data from the model is send to the view component
            'propiedades' => $propiedades,
            'resultado' => $resultado 
        ]);
    }
    public static function crear(Router $router){
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        
        $router->render('propiedades/crear',[
            'propiedad' => $propiedad,
            'vendedores' => $vendedores
        ]);
    }
    public static function actualizar(){
        echo "actualizar";
    }        
}
