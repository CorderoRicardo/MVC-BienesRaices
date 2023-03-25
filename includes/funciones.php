<?php
define('TEMPLATES_URL',__DIR__ . '/templates');
define('FUNCIONES_URL',__DIR__ . '/funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'].'/imagenes/');

function incluirTemplate( string $nombre, bool $inicio = false ){
    include TEMPLATES_URL . "/$nombre.php";
}

/** Validates login credentials to access the CRUD pages */
function autenticacion(){
    session_start();

    if(!$_SESSION['login']){
        header('location: /S26-BienesRaices/index.php');
    }
}

/**Prints the content of an object and stops the loading after it */
function debugging($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

/**Escapes the HTML code to add a bit more of security */
function cleanHTML($html): string{
    $s = htmlspecialchars($html);
    return $s;
}

/**Validates the type of content */
function validarTipoContenido($tipo){
    $tipos = ["propiedad","vendedor"];
    return in_array($tipo,$tipos);
}

/**Returns a success message */
function mostrarNotificacion($codigo){
    $mensaje ='';
    switch($codigo){
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

/** Validates the ID from an URL and return its */
function validateIDfromURL(string $url){
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: $url");
    }
    return $id;        
}