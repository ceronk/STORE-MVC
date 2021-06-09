<?php

class UsuarioController
{

    public function index()
    {
        echo "Controlador usuarios, accion index";
    }

    public function registro()
    {

        require_once 'VIEWS/USUARIO/registro.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            var_dump($_POST);
        }
    }
}
