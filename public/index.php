<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\BlogController;
use Controllers\LoginController;
use Controllers\PaginasController;

$router = new Router();
// CRUD for Propiedades
$router->get('/admin',[PropiedadController::class,'index']);
$router->get('/propiedades/crear',[PropiedadController::class,'crear']);
$router->post('/propiedades/crear',[PropiedadController::class,'crear']);
$router->get('/propiedades/actualizar',[PropiedadController::class,'actualizar']);
$router->post('/propiedades/actualizar',[PropiedadController::class,'actualizar']);
$router->post('/propiedades/eliminar',[PropiedadController::class,'eliminar']);
// CRUD for Vendedores
$router->get('/vendedores/crear',[VendedorController::class,'crear']);
$router->post('/vendedores/crear',[VendedorController::class,'crear']);
$router->get('/vendedores/actualizar',[VendedorController::class,'actualizar']);
$router->post('/vendedores/actualizar',[VendedorController::class,'actualizar']);
$router->post('/vendedores/eliminar',[VendedorController::class,'eliminar']);
// CRUD for Entradas
$router->get('/entradas/crear',[BlogController::class,'crear']);
$router->post('/entradas/crear',[BlogController::class,'crear']);
$router->get('/entradas/actualizar',[BlogController::class,'actualizar']);
$router->post('/entradas/actualizar',[BlogController::class,'actualizar']);
$router->post('/entradas/eliminar',[BlogController::class,'eliminar']);

// For visitors
$router->get('/',[PaginasController::class,'index']);
$router->get('/nosotros',[PaginasController::class,'nosotros']);
$router->get('/propiedades',[PaginasController::class,'propiedades']);
$router->get('/propiedad',[PaginasController::class,'propiedad']);
$router->get('/blog',[PaginasController::class,'blog']);
$router->get('/entrada',[PaginasController::class,'entrada']);
$router->get('/contacto',[PaginasController::class,'contacto']);
$router->post('/contacto',[PaginasController::class,'contacto']);

// Login and Auth
$router->get('/login',[LoginController::class,'login']);
$router->post('/login',[LoginController::class,'login']);
$router->get('/logout',[LoginController::class,'logout']);


$router->comprobarRutas();