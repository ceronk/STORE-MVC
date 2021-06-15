<?php


Class Categoria extends Database{

    public $id, $nombre, $db;

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

    public function listarCategorias(){
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id ASC");

        return $categorias;
    }

    public function save(){
        $sql = "INSERT INTO categorias VALUES (null, '{$this->getNombre()}')";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }



}

?>