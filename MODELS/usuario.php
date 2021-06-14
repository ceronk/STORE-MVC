<?php



class Usuario extends Database{

    private $id, $nombre, $apellidos, $email, $pass, $rol, $imagen, $db;

    //Definicion de constructor para darle un valor a la propiedad y mantener una conexion
    public function __construct()
    {
        $this->db = Database::connect() ;
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
  
    public function getApellidos()
    {
        return $this->apellidos;
    }
 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $this->db->real_escape_string($apellidos);

        return $this;
    }
 
    public function getEmail()
    {
        return $this->email;
    }
 
    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);

        return $this;
    }
 
    public function getPass()
    {
        //Encriptando contraseña con algoritmo BCRYPT, cifrando 4 veces el pass
        return password_hash($this->db->real_escape_string($this->pass),PASSWORD_BCRYPT, ['cost' => 4]);
    }
 
    public function setPass($pass)
    {
        
        $this->pass = $pass;

        return $this;
    }
  
    public function getRol()
    {
        return $this->rol;
    }
 
    public function setRol($rol)
    {
        $this->rol = $rol;

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


    public function save(){
        $sql =" INSERT INTO usuarios 
            VALUES (null,   '{$this->getNombre()}',
                            '{$this->getApellidos()}',
                            '{$this->getEmail()}',
                            '{$this->getPass()}',
                            'user',
                            'null') ";

        $save = $this->db->query($sql);
        
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }

    public function login(){
        $resultado = false;

        $email = $this->email;
        $pass = $this->pass;


        //Comprobar si existe el usuario
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);


        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();

            //verificar contraseña  

            $verify = password_verify($pass,$usuario->pass);

            
            if ($verify) {
                $resultado = $usuario;
            }
        }

        return $resultado;
    }


}