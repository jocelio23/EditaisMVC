<?php
namespace bd;


abstract class Connection{

    private static $conn;

    public static function getConn(){
        if(!self::$conn){
            self::$conn = new \PDO('mysql: host=localhost:3306; dbname=editais', 'root', '');
        }
        return self::$conn;
    }
}
