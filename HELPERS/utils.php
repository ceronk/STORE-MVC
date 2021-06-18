<?php


class Utils
{

    public static function deleteSession($sessionName)
    {
        if (isset($_SESSION[$sessionName])) {
            $_SESSION[$sessionName] = null;
            unset($_SESSION[$sessionName]);
        }

        return $sessionName;
    }

    public static function isAdmin()
    {
        //En caso de que no exista la sesion de usuario
        if (!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function isIdentity()
    {
        if (!isset($_SESSION['identity'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }

    public static function showCategorias()
    {
        require_once 'MODELS/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->listarCategorias();
        return $categorias;
    }

    public static function statsCarrito()
    {
        $stats = array(
            'count' => 0,
            'total' => 0
        );
        if (isset($_SESSION['carrito'])) {
            $stats['count'] = count($_SESSION['carrito']);

            foreach ($_SESSION['carrito'] as $productCarrito) {
                $stats['total'] += $productCarrito['precio'] * $productCarrito['unidades'];
            }
        }

        return $stats;
    }

    public static function showStatus($status)
    {
        $value = 'pendiente';
        if ($status == 'confirm') {
            $value = 'Pendiente';
        } elseif ($status == 'preparation') {
            $value = 'En preparación';
        } elseif ($status == 'ready') {
            $value = 'Preparado para el enviar';
        } elseif ($status == 'sended') {
            $value = 'Enviado';
        }

        return $value;
    }
}
