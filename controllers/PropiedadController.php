<?php 

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{
    public static function index(Router $router){
        // The model interacts with the DB and gets the data
        $propiedades = Propiedad::all();
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin',[
            // The data from the model is send to the view component
            'propiedades' => $propiedades,
            'resultado' => $resultado 
        ]);
    }
    public static function crear(Router $router){
        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $propiedad = new Propiedad($_POST['propiedad']);
            
            /*subida de archivos*/
            // generar nombre único para la imagen
            $nombreImagen = md5( uniqid( rand(), true ) ) . '.jpg';

            // Agregar la imagen
            // Realiza un resize a la imagen
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImage($nombreImagen);
            }

            // Validar -error por aqui 
            $errores = $propiedad->validar();
            
            if(empty($errores)){
                //Crear la carpeta para subir imagenes
                if(!is_dir(!is_dir(CARPETA_IMAGENES))){
                    mkdir(CARPETA_IMAGENES);
                }        

                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                //Guarda en la BD
                $propiedad->guardar();
            }  

        }

        $router->render('propiedades/crear',[
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router){
        $id = validateIDfromURL('/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        $router->render('propiedades/actualizar',[
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }        
}
