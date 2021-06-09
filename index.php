<?php

require_once 'autoload.php';
require_once 'CONFIG/parameters.php';
require_once 'VIEWS/LAYOUT/header.php';
require_once 'VIEWS/LAYOUT/sidebar.php';


if (isset($_GET['controller'])) {
    $nombreControlador = $_GET['controller'] . 'Controller';
} else {
    echo "La pagina que buscas no existe";
    exit();
}

//Comprobando que exista el controlador
if (isset($nombreControlador) && class_exists($nombreControlador)) {

    $controlador = new $nombreControlador();

    //para llamar vistas de forma dinamica
    // (recoger variables por get)

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action(); //de esta forma llama al metodo que tenemos
        //en esa clase
    } else {
        echo "La vista que buscas no existe";
    }
} else {
    echo "El controlador que buscas no existe";
}


require_once 'VIEWS/LAYOUT/footer.php';
?>