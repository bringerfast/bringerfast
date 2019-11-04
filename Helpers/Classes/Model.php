<?php

namespace Classes;

use Connection\DB;
use Throwable;
USE PDO;

class Model
{
    protected $table;
    protected $primaryKey;
    protected $fields;
    protected $statement;
    protected $connection;
    protected static $object;

    public function __construct()
    {
        foreach ($this->fields as $value){
            $this->$value = '';
        }
        $this->connection = DB::getConnection();
    }

    public static function insert($data){
        try{
            $child = get_called_class();
            $object = new $child();
            if (count($matchedArray = array_intersect($object->fields, array_keys($data))) != count($object->fields)){
                throwError("keys of formData are not matched with fields of ".$child." Class");
            }
            $inserQuery = "INSERT INTO $object->table (";
            $insertPlaceHolder = "";
            foreach ($matchedArray as $key => $value){
                end($object->fields);
                if ($key === key($object->fields)){
                    $inserQuery .= "$value ";
                    $insertPlaceHolder .= ":$value ";
                } else {
                    $inserQuery .= "$value, ";
                    $insertPlaceHolder .= ":$value, ";
                }
            }
            $inserQuery .= ") VALUES (".$insertPlaceHolder.")";
            $object->statement = $object->connection->prepare($inserQuery);
            $object->statement->execute(array_intersect_key($data, array_flip($matchedArray)));
            return true;
        } catch(Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function save(){
        try{
            $data = [];
            $insertPlaceHolder = "";
            $insertQuery = "INSERT INTO $this->table (";
            $updateQuery = "UPDATE $this->table SET ";
            foreach ($this->fields as $key => $value){
                end($this->fields);
                if ($key === key($this->fields)){
                    $insertQuery .= "$value ";
                    $insertPlaceHolder .= ":$value ";
                    $updateQuery .= "$value=:$value WHERE ".$this->primaryKey."=:".$this->primaryKey;
                } else {
                    $insertQuery .= "$value, ";
                    $insertPlaceHolder .= ":$value, ";
                    $updateQuery .= "$value=:$value,";
                }
                $data[":".$value] = $this->$value!="" ? $this->$value : NULL;
            }
            $insertQuery .= ") VALUES (".$insertPlaceHolder.")";
            if (isset($this->{$this->primaryKey})){
                $data[$this->primaryKey] = $this->{$this->primaryKey};
                $this->connection->prepare($updateQuery)->execute($data);
                return true;
            } else {
                $this->statement = $this->connection->prepare($insertQuery);
                $this->statement->execute($data);
                return true;
            }
        } catch(Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function find($primaryKey){
        try{
            $child = get_called_class();
            $object = new $child();
            $sql = "SELECT * FROM $object->table WHERE $object->primaryKey=:$object->primaryKey";
            $stmt = $object->connection->prepare($sql);
            $stmt->execute([$object->primaryKey => $primaryKey]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            foreach ($data as $key => $value){
                $object->$key = $value;
            }
            return $object;
        } catch(Throwable $e){
            die("ERROR: Could not prepare/execute query: $sql. " . $e->getMessage());
        }
    }

    public function toArray(){
        if (isset($this->objects)){
            $returnable = [];
            foreach ($this->objects as $object){
                array_push($returnable,$object->toArray());
            }
            return $returnable;
        }
        return (array) $this;
    }

    public function toJSON(){
        if (isset($this->objects)){
            $returnable = [];
            foreach ($this->objects as $object){
                array_push($returnable,$object->toArray());
            }
            return str_replace('\u0000*\u0000','',json_encode($returnable));
        }
        return str_replace('\u0000*\u0000','',json_encode((array)$this));
    }


    public static function all(){
        $child = get_called_class();
        $object = new $child();
        $sql = "SELECT * FROM $object->table";
        $stmt = $object->connection->prepare($sql);
        $stmt->execute();
        $objects = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
            $tempObject = new $child();
            foreach ($data as $key => $value){
                $tempObject->$key = $value;
            }
            array_push($objects,$tempObject);
        }
        $object->objects = $objects;
        return $object;
    }

    public static function paginate($perPage){
        dd($_GET);
    }

    public function delete(){
        try{
            if (isset($this->{$this->primaryKey})){
                $deleteQuery = 'DELETE FROM '.$this->table.' WHERE '.$this->primaryKey.' = :'.$this->primaryKey;
                $statement = DB::getConnection()->prepare($deleteQuery);
                $statement->execute([':'.$this->primaryKey => $this->{$this->primaryKey}]);
                return true;
            }
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function findDelete($primaryKey){
        try{
            $child = get_called_class();
            $object = new $child();
            $deleteQuery = 'DELETE FROM '.$object->table.' WHERE '.$object->primaryKey.' = :'.$object->primaryKey;
            $statement = DB::getConnection()->prepare($deleteQuery);
            $statement->execute([':'.$object->primaryKey => $primaryKey]);
            return true;
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public function __destruct()
    {
        unset($this->statement);
        unset($this->connection);
    }
}