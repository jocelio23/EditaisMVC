<?php
namespace banco\bd;


abstract class Connetion{

    private static $conn;

    public static function getConn(){
        if(!self::$conn){
            self::$conn = new \PDO('mysql: host = localhost; dbname = editais', 'root', '');
        }
        return self::$conn;
    }
}