<?php

require_once 'autoload.php';
require_once 'CONFIG/parameters.php';
require_once 'VIEWS/LAYOUT/header.php';
require_once 'VIEWS/LAYOUT/sidebar.php';

function showError()
{
    $error = new ErrorController();
    $error->index();
}

if (isset($_GET['controller'])) {
    $nombreControlador = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    //carga el controlador por defecto (config/parameters)
    $nombreControlador = controller_default;
} else {
    showError();
    exit();
}

//Comprobando que exista el controlador
if (isset($nombreControlador) && class_exists($nombreControlador)) {

    $controlador = new $nombreControlador();

    //llama las vistas de forma dinamica (metodo get)

    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action(); //llamada al metodo dentro de X clase
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        //carga la accion por defecto (config/parameters)
        $actionDefault = action_default;
        $controlador->$actionDefault();
    } else {
        showError();
    }
} else {
    showError();
}


require_once 'VIEWS/LAYOUT/footer.php';
