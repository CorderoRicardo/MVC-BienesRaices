<?php 

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

class PaginasController{
    public static function index(Router $router){
        $propiedades = Propiedad::getRows(3);
        $router->render('paginas/index',[
            "propiedades" => $propiedades,
            "inicio" => true
        ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros',[

        ]);
    }
    public static function propiedades(Router $router){
        $router->render('paginas/propiedades',[

        ]);
    }    
    public static function propiedad(Router $router){
        $router->render('paginas/propiedad',[

        ]);
    }    
    public static function blog(Router $router){
        $router->render('paginas/blog',[

        ]);
    }    
    public static function entrada(Router $router){
        $router->render('paginas/entrada',[

        ]);
    }
    public static function contacto(Router $router){
        $router->render('paginas/contacto',[

        ]);
    }        
}