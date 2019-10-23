<?php

namespace Classes;


use Connection\DB;
use PDOException;
class Model
{
    protected $table = '';
    protected $fillable = '';
    protected $statement = '';
    protected $connection = '';
    protected static $object = '';

    public function __construct()
    {
        foreach ($this->fillable as $value){
            $this->$value = '';
        }
        $this->connection = DB::getConnection();
    }

    public function insert($data){
        try{
            $sql = "INSERT INTO $this->table (";
            $VALUES = "";
            foreach ($this->fillable as $key => $value){
                end($this->fillable);
                if ($key === key($this->fillable)){
                    $sql .= "$value ";
                    $VALUES .= ":$value ";
                } else {
                    $sql .= "$value, ";
                    $VALUES .= ":$value, ";
                }
            }
            $sql .= ") VALUES (".$VALUES.")";
            $this->statement = $this->connection->prepare($sql);
            $this->statement->execute($data);
            return true;
        } catch(PDOException $e){
            die("ERROR: Could not prepare/execute query: $sql. " . $e->getMessage());
        }
    }

    public function save(){
        try{
            $data = [];
            $sql = "UPDATE $this->table SET ";
            foreach ($this->fillable as $key => $value){
                end($this->fillable);
                if ($key === key($this->fillable)){
                    $sql .= "$value=:$value WHERE id=:id";
                } else {
                    $sql .= "$value=:$value,";
                }
                $data[$value] = $this->$value;
            }
            if (isset($this->id)){
                $data['id'] = $this->id;
                $this->connection->prepare($sql)->execute($data);
                return true;
            } else {
                return $this->insert($data);
            }
        } catch(PDOException $e){
            die("ERROR: Could not prepare/execute query: $sql. " . $e->getMessage());
        }
    }

    public static function find($id){
        try{
            $child = get_called_class();
            $object = new $child();
            $sql = "SELECT * FROM $object->table WHERE id=:id";
            $stmt = DB::getConnection()->prepare($sql);
            $stmt->execute(['id' => $id]);
            $data = $stmt->fetch();
            foreach ($data as $key => $value){
                $object->$key = $value;
            }
            return $object;
        } catch(PDOException $e){
            die("ERROR: Could not prepare/execute query: $sql. " . $e->getMessage());
        }
    }

    public static function where($column,$condition,$value){
        $child = get_called_class();
        if (is_string(self::$object)){
            $object = new $child();
        } else {
            $object = self::$object;
        }
        self::$object = $object;
        if (isset($object->whereCondition)){
            $object->whereCondition .= " AND $column$condition:$column ";
        } else {
            $object->whereCondition = "SELECT * FROM $object->table WHERE $column$condition:$column ";
        }
        $object->whereValues[$column] = $value;
        return $object;
    }


    public function get(){
        try{
            $sql = $this->whereCondition;
            print_r($this->whereValues);
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($this->whereValues);
            $objects = [];
            while ($data = $stmt->fetch()){
                $tempObject = $this;
                foreach ($data as $key => $value){
                    $tempObject->$key = $value;
                }
                array_push($objects,$tempObject);
            }
            return $objects;
        } catch(PDOException $e){
            die("ERROR: Could not prepare/execute query: $sql. " . $e->getMessage());
        }
    }

    public static function all(){
        $child = get_called_class();
        $object = new $child();
        $sql = "SELECT * FROM $object->table";
        $stmt = $object->connection->prepare($sql);
        $stmt->execute();
        $objects = [];
        while ($data = $stmt->fetch()){
            $tempObject = new $child();
            foreach ($data as $key => $value){
                $tempObject->$key = $value;
            }
            array_push($objects,$tempObject);
        }
        return $objects;
    }

    public function __destruct()
    {
        unset($this->statement);
        unset($this->connection);
    }
}