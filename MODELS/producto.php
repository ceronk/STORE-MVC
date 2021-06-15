<?php

require_once 'CONFIG/db.php';

class Producto extends Database
{

    public $db, $id, $nombre, $descripcion, $precio, $stock, $oferta, $fecha, $imagen, $idCategoria;

    public function __construct()
    {
        $this->db = Database::connect();
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);

        return $this;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);

        return $this;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);

        return $this;
    }

    public function getOferta()
    {
        return $this->oferta;
    }

    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);

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

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }

    public function listarProducto()
    {
        $producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->id}");

        return $producto->fetch_object();
    }

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id ASC");

        return $productos;
    }


    public function save()
    {
        $sql = "INSERT INTO productos VALUES(null,
                                            '{$this->getNombre()}',
                                            '{$this->getDescripcion()}',
                                            {$this->getPrecio()},
                                            {$this->getStock()},
                                            null,
                                            CURDATE(),
                                            '{$this->getImagen()}',
                                            {$this->getIdCategoria()})";
        $save = $this->db->query($sql);

        $result = false;

        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function actualizar()
    {
        $sql = "UPDATE productos SET nombre = '{$this->getNombre()}',
                                     descripcion = '{$this->getDescripcion()}',
                                     precio = {$this->getPrecio()},
                                     stock = {$this->getStock()},
                                     id_categoria = '{$this->getIdCategoria()}'";

        if ($this->getImagen() != null) {
            $sql .= ", imagen = '{$this->getImagen()}'";
        }
                                        $sql .= " WHERE id = {$this->id}";  //kp2

      
        $delete = $this->db->query($sql);

        return $delete;
    }


    public function eliminar()
    {
        $query = "DELETE FROM productos WHERE id = {$this->id}";
        $delete = $this->db->query($query);
        $result = false;

        if ($delete) {
            $result = true;
        }
        return $result;
    }
}
