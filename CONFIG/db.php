<?php



class Database{

    public static function connect(){
        $db = new mysqli('localhost','root','','udemy_mvc_store');
        $db->query(" SET NAMES 'utf8' ");
        return $db;
    }


}