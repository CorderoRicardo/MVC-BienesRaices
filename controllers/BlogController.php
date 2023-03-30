<?php 

namespace Controllers;
use MVC\Router;
use Model\Blog;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController{
    public static function crear(Router $router){
        $entrada = new Blog;
        $errores = Blog::getErrores();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $entrada = new Blog($_POST['entrada']);

            /*subida de archivos*/
            // generar nombre único para la imagen
            $nombreImagen = md5( uniqid( rand(), true ) ) . '.jpg';

            // Agregar la imagen
            // Realiza un resize a la imagen
            if($_FILES['entrada']['tmp_name']['imagen']){
                $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(1280,720);
                $entrada->setImage($nombreImagen);
            }
            
            $errores = $entrada->validar();

            if(empty($errores)){
                //Crear la carpeta para subir imagenes
                if(!is_dir(!is_dir(CARPETA_IMAGENES.'entradas/'))){
                    mkdir(CARPETA_IMAGENES.'entradas/');
                }        

                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . 'entradas/' . $nombreImagen);

                //Guarda en la BD
                $entrada->guardar();
            }              
        }  
        $router->render('entradas/crear',[
            'entrada' => $entrada,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = validateIDfromURL('/admin');
        $entrada = Blog::find($id);
        $errores = Blog::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['entrada'];
            $entrada->sincronizar($args);

            $nombreImagen = md5( uniqid( rand(), true ) ) . '.jpg';

            $errores = $entrada->validar();

            if(empty($errores)){
            // Insertar la query en la base de datos
                if($_FILES['entrada']['tmp_name']['imagen']){
                    $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(1280,720);
                    $entrada->setImage($nombreImagen);
                    $image->save(CARPETA_IMAGENES .'entradas/'. $nombreImagen);    
                }    
                $entrada->guardar();
            }              
        }

        $router->render('entradas/actualizar',[
            'entrada' => $entrada,
            'errores' => $errores
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $entrada = Blog::find($id);
                    $entrada->eliminar();
                }
            }
        }
    }

}