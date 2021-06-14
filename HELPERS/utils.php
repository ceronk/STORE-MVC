<?php


Class Utils{

    public static function deleteSession($sessionName){
        if (isset($_SESSION[$sessionName])) {
            $_SESSION[$sessionName] = null;
            unset($_SESSION[$sessionName]);
        }

        return $sessionName;

    }
}
