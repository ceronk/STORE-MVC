<?php
require_once 'MODELS/pedido.php';

class PedidoController
{

    public function finalizar()
    {

        require_once 'VIEWS/PEDIDO/finalizar.php';
    }

    public function add()
    {
        if (isset($_SESSION['identity'])) {

            // $id
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $carritoData = Utils::statsCarrito();
            $coste = $carritoData['total'];
            // $estado
            // $fecha
            // $hora 
            $id_usuario = $_SESSION['identity']->id;

            if ($provincia && $localidad && $direccion && $id_usuario) {
                //guardar datos en BDD
                $pedido = new Pedido();
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);
                $pedido->setId_usuario($id_usuario);
                $save = $pedido->save();

                //Guardar linea pedido
                $saveLinea = $pedido->save_Linea();

                if ($save && $saveLinea) {
                    $_SESSION['pedido'] = 'complete';
                } else {
                    $_SESSION['pedido'] = 'failed';
                }
            } else {
                $_SESSION['pedido'] = 'failed';
            }

            header("Location:" . base_url . "pedido/confirmado");
        } else {
            //redirigir al index
            header("Location:" . base_url);
        }
    }

    public function confirmado()
    {

        if (isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setId_usuario($identity->id);
            $finalPedido = $pedido->listarProductoByUser();

            $pedidoProd = new Pedido();
            $itms = $pedidoProd->getProductosByPedido($finalPedido->id);
        }
        require_once 'VIEWS/PEDIDO/confirmado.php';
    }

    public function mispedidos()
    {
        Utils::isIdentity();

        $idUsuario = $_SESSION['identity']->id;

        $pedido = new Pedido();
        $pedido->setId_usuario($idUsuario);
        $pedidosData = $pedido->getPedidosByUser();
        require_once 'VIEWS/PEDIDO/mispedidos.php';
    }

    public function detalle()
    {
        Utils::isIdentity();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            //obtener el pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $finalPedido = $pedido->listarProducto();

            //obtener productos
            $pedidoProd = new Pedido();
            $itms = $pedidoProd->getProductosByPedido($id);

            require_once 'VIEWS/PEDIDO/detalle.php ';
        } else {
            header("Location:" . base_url . "pedido/mispedidos");
        }
    }
    public function gestion(){
        Utils::isAdmin();

        $gestion = true;

        $pedido = new Pedido();
        $pedidosData = $pedido->getAll();


        require_once 'VIEWS/PEDIDO/mispedidos.php';
    }
}
