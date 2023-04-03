<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Model\Blog;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){
        $propiedades = Propiedad::getRows(3);
        $entradas = Blog::getRows(2);        
        $router->render('paginas/index',[
            "propiedades" => $propiedades,
            "inicio" => true,
            "entradas" => $entradas
        ]);
    }
    public static function nosotros(Router $router){
        $router->render('paginas/nosotros');
    }
    public static function propiedades(Router $router){
        $propiedades = Propiedad::getRows(10);        
        $router->render('paginas/propiedades',[
            'propiedades' =>$propiedades
        ]);
    }    
    public static function propiedad(Router $router){
        $id = validateIDfromURL('/propiedades');
        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad',[
            'propiedad' => $propiedad
        ]);
    }    
    public static function blog(Router $router){
        $entradas = Blog::getRows(9);
        $router->render('paginas/blog',[
            'entradas' => $entradas 
        ]);
    }    
    public static function entrada(Router $router){
        $id = validateIDfromURL('/blog');
        $entrada = Blog::find($id);
        $router->render('paginas/entrada',[
            'entrada' => $entrada
        ]);
    }
    public static function contacto(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // nueva instancia de phpmailer
            $mail = new PHPMailer();
            //configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '73b3da268e5fd9';
            $mail->Password = '213750ad594f2e';           
            $mail->SMTPSecure = 'tls'; 
            //configurar el contenido del mail
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un Nuevo Mensaje';
            //habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            //definir el contenido
            $contenido = "<html><p>Tienes un nuevo mensaje</p></html>";
            $mail->Body = $contenido;
            $mail->AltBody = "Texto alternativo/plano";
            //enviar el email
            if($mail->send()){
                echo "Mensaje enviado correctamente";
            }else{
                echo "El mensaje no se pudo enviar...";
            }
        }
        $router->render('paginas/contacto',[

        ]);
    }        
}