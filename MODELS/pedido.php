<?php

require_once 'CONFIG/db.php';

class Pedido extends Database
{

    public $db, $id, $provincia, $localidad, $direccion, $coste, $estado, $fecha, $hora, $id_usuario;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    //-------------GETS & SETS-------------------------------------------

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getProvincia()
    {
        return $this->provincia;
    }

    public function setProvincia($provincia)
    {
        $this->provincia = $this->db->real_escape_string($provincia);

        return $this;
    }

    public function getLocalidad()
    {
        return $this->localidad;
    }

    public function setLocalidad($localidad)
    {
        $this->localidad = $this->db->real_escape_string($localidad);

        return $this;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);

        return $this;
    }

    public function getCoste()
    {
        return $this->coste;
    }

    public function setCoste($coste)
    {
        $this->coste = $coste;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    //-------------ACTIONS-----------------------------------------------

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id ASC");

        return $productos;
    }

    public function listarProducto()
    {
        $producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->id}");

        return $producto->fetch_object();
    }

    public function listarProductoByUser()
    {
        $sql = "SELECT p.id, p.coste FROM pedidos p"
            //INNER JOIN lineaspedidos lp ON p.id=lp.id_pedido
            . " WHERE p.id_usuario = {$this->getId_usuario()} ORDER BY id DESC LIMIT 1";

        $prdct = $this->db->query($sql);

        return $prdct->fetch_object();
    }

    public function getProductosByPedido($id)
    {
        $sql = "SELECT pr.*, lp.unidades from productos pr
            INNER JOIN lineaspedidos lp ON pr.id=lp.id_producto
            WHERE lp.id_pedido = {$id}";

        $prodSel = $this->db->query($sql);

        return $prodSel;
    }

    public function save()
    {
        $sql = "INSERT INTO pedidos VALUES(null,
                                            '{$this->getProvincia()}',
                                            '{$this->getLocalidad()}',
                                            '{$this->getDireccion()}',
                                            {$this->getCoste()},
                                            'confirm',
                                            CURDATE(),
                                            CURTIME(),
                                            {$this->getId_usuario()})";

        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function save_Linea()
    {
        // "Si realizamos un INSERT o UPDATE en una tabla 
        //con un campo AUTO_INCREMENT, podemos obtener 
        //el ID del último registro insertado / actualizado inmediatamente. "


        $sql = "SELECT LAST_INSERT_ID() AS 'pedido'";
        $query = $this->db->query($sql);
        $pedidoId = $query->fetch_object()->pedido;


        $carritoData = $_SESSION['carrito'];

        foreach ($carritoData as $valor) {
            $item = $valor['producto'];

            $insert = "INSERT INTO lineaspedidos VALUES (NULL,
                                                        {$pedidoId},
                                                        {$item->id},
                                                        {$valor['unidades']})";

            $producto = $this->db->query($insert);

            $result = false;
        }
        if ($producto) {
            $result = true;
        }
        return $result;
    }

    public function getPedidosByUser()
    {
        $sql = "SELECT p.* FROM pedidos p
            WHERE p.id_usuario = {$this->getId_usuario()} ORDER BY id DESC";

        $prdct = $this->db->query($sql);

        return $prdct;
    }

    public function updatePedido(){
        $sql = "UPDATE pedidos SET estado = '{$this->getEstado()}'
            WHERE id = {$this->getId()}";


        $delete = $this->db->query($sql);

        return $delete;
    }
}
