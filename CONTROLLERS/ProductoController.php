<?php

require_once 'MODELS/producto.php';

class ProductoController
{

    public function index()
    {
        $productos = new Producto();

        $prdcts = $productos->getRandomProducts(6);
        require_once 'VIEWS/PRODUCTO/destacados.php';
    }

    public function ver()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $getOneProduct = $producto->listarProducto();
        }
        require_once 'VIEWS/PRODUCTO/ver.php';
    }

    public function gestion()
    {
        Utils::isAdmin();
        $producto = new Producto();
        $products = $producto->getAll();
        require_once 'VIEWS/PRODUCTO/gestion.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'VIEWS/PRODUCTO/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            //Manipulacion de imagen
            $file = $_FILES['imagen'];                                //variable superglobal para archivos
            $fileName = $file['name'] == null ? null : $file['name']; //recogiendo nombre archivo
            $mimeType = $file['type'];                                // . . . tipo archivo

            if ($nombre && $descripcion && $precio && $stock && $categoria) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setIdCategoria($categoria);

                if (isset($_FILES['imagen'])) {

                    if ($mimeType == 'image/jpg' || $mimeType == 'image/jpeg' || $mimeType == 'image/png' || $mimeType == 'image/gif') {

                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true); //tercer parametro sirve para crear directorios recursivamente
                        }
                        $producto->setImagen($fileName);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $fileName);
                    }
                }

                if (isset($_GET['id'])) {
                    //Si llega una id por get, actualiza reutilizando 
                    //la accion save del controlador
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->actualizar();
                } else {
                    //inserta un nuevo producto 
                    $save = $producto->save();
                }

                if ($save) {
                    $_SESSION['producto'] = 'complete';
                } else {
                    $_SESSION['producto'] = 'failed';
                }
            } else {
                $_SESSION['producto'] = 'failed';
            }
        } else {
            $_SESSION['producto'] = 'failed';
        }
        header("Location:" . base_url . "producto/gestion");
    }



    public function editar()
    {
        Utils::isAdmin();

        if (isset($_GET['id'])) {
            $editar = true;
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $prod = $producto->listarProducto();
            require_once 'VIEWS/PRODUCTO/crear.php';
        } else {
            header("Location:" . base_url . "producto/gestion");
        }
    }

    public function eliminar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $producto = new Producto();
            $producto->setId($id);
            $delete = $producto->eliminar();

            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }

        header("Location:" . base_url . "producto/gestion");
    }
}
