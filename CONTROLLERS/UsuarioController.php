<?php

require_once 'MODELS/usuario.php';

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

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $pass = isset($_POST['password']) ? $_POST['password'] : false;

            if ($nombre && $apellidos && $email && $pass) {

                $usuario = new Usuario;
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPass($pass);
                $save = $usuario->save();

                if ($save) {
                    $_SESSION['register'] = 'Complete';
                } else {
                    $_SESSION['register'] = 'Failed';
                }
            } else {
                $_SESSION['register'] = 'Failed';
            }
        } else {
            $_SESSION['register'] = 'Failed';
        }
        header("Location:" . base_url . "usuario/registro");
    }


    public function login()
    {
        if (isset($_POST)) {
            //Identificar usuario
            //Consulta BDD
            $usuario = new Usuario();


            $usuario->setEmail($_POST["email"]);
            $usuario->setPass($_POST["password"]);
            $identity = $usuario->login(); //devuelve objeto desde el modelo

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity; //creando sesion y asignandole todo el objeto 

                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true; //sesion especial para usuario administrador
                }
            } else {
                $_SESSION['error_login'] = "identificación fallida";
            }


            //Crear Sesión
        }
        header('Location:' . base_url);
    }

    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }

        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        header("Location:" . base_url);
    }
}  //Fin de la clase
