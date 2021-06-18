<?php

require_once 'MODELS/producto.php';

class CarritoController
{

    public function index()
    {
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1){
        $carritoObject = $_SESSION['carrito'];
        }else{
            $carritoObject = array();
        }

        require_once 'VIEWS/CARRITO/ver.php';
    }


    public function add()
    {

        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            header("Location:" . base_url);
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;

            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {

            //conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $prodCarrito = $producto->listarProducto();


            //añadir al carrito 
            if (is_object($prodCarrito)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $prodCarrito->id, //instancia BDD
                    "precio" => $prodCarrito->precio,
                    "unidades" => 1,
                    "producto" => $prodCarrito //objeto adjunto para manipulacion optima
                );
            }
        }

        header("Location:" . base_url . "carrito/index");
    }

    public function deleteAll()
    {
        unset($_SESSION['carrito']);
        header("Location:" . base_url . "carrito/index");
    }

    public function remove(){
        //Remover items del carrito
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            unset($_SESSION['carrito'][$index]);
        }
        header("Location:" . base_url . "carrito/index");
    }

    public function up(){
        //aumentar items del carrito
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']++;
        }
        header("Location:" . base_url . "carrito/index");
    }

    public function down(){
        //disminuir items del carrito
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']--;

            if ($_SESSION['carrito'][$index]['unidades'] == 0) {
                unset($_SESSION['carrito'][$index]);
            }
        }
        header("Location:" . base_url . "carrito/index");
    }

    
}
