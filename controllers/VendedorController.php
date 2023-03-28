<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;

class VendedorController{
    public static function crear(Router $router){
        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Crear una instancia de vendedor
            $vendedor = new Vendedor($_POST['vendedor']);

            // Validar que no haya campos vacios
            $errores = $vendedor->validar();

            //no hay errores
            if(empty($errores)){
                $vendedor->guardar();
            }            
        }
        
        $router->render('vendedores/crear',[
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function actualizar(Router $router){
        $router->render('vendedores/actualizar',[

        ]);
    }

    public static function eliminar(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }
    }
    

}