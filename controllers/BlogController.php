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
                $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800,600);
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

    public static function actualizar(){
        echo "actualizando";
    }

    public static function eliminar(){
        echo "borrando";
    }

}