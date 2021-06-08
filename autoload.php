<?php


function controllers_autoload($classname){
    include 'CONTROLLERS/'. $classname . '.php';
}

spl_autoload_register('controllers_autoload');