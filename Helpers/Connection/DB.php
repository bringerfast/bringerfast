<?php


namespace Connection;
use PDO;
use PDOException;

class DB
{
    public static function connectionCreator(){
        // TODO: Implement __callStatic() method.
        $servername = constant('DB_HOST');
        $username = constant('DB_USER');
        $password = constant('DB_PASS');
        $database = constant('DB_NAME');
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getConnection(){
        return self::connectionCreator();
    }
}