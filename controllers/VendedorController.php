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
        $id = validateIDfromURL('/admin');
        $errores = Vendedor::getErrores();
        $vendedor = Vendedor::find($id);

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
            $args = $_POST['vendedor'];

            $vendedor->sincronizar($args);

            $errores = $vendedor->validar();

            if(empty($errores)){
                $vendedor->guardar();
            }
        }        

        $router->render('vendedores/actualizar',[
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function eliminar(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }
    }
    

}