<?php

require_once 'MODELS/categoria.php';

class CategoriaController{
    
    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->listarCategorias();
        require_once 'VIEWS/CATEGORIA/index.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'VIEWS/CATEGORIA/crear.php';       
    }

    public function save(){

        Utils::isAdmin();

        if (isset($_POST) && isset($_POST['nombre'])) {
            

        //guardar categoria
        $categoria= new Categoria();
        $categoria->setNombre($_POST['nombre']);
        $categoria->save();
        header("Location:".base_url."categoria/index");

        }
    }


}