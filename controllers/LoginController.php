<?php 

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{
    public static function login(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            echo "autenticación en progreso";
        }
        $router->render('auth/login',[
            "errores" => []
        ]);
    }
    public static function logout(){
        echo "Logout";
    }

}