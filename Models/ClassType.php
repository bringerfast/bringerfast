<?php
/**
 * Created by PhpStorm.
 * User: raja
 * Date: 31/10/19
 * Time: 2:09 AM
 */

namespace Models;

use Connection\DB;
use Throwable;

class ClassType
{
    private $table = 't_class_types';
    private $fields = ['class_type_id','class_type_name'];

    public static function all(){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_class_types");
            $stmt->execute();
            $AllRows = [];
            while ($row = $stmt->fetch()){
                $AllRows[] = $row;
            }
            return $AllRows;
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function insert($data){
        try{
            $sql = "INSERT INTO t_class_types (class_type_name) VALUES (?)";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([$data['classTypeName']]);
            return true;
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function select($class_type_id){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_class_types WHERE class_type_id = :class_type_id LIMIT 1");
            $stmt->execute([':class_type_id' => $class_type_id]);
            return $stmt->fetch();
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function update($data){
        try{
            $sql = "UPDATE t_class_types SET class_type_name=:class_type_name WHERE class_type_id=:class_type_id";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([':class_type_name'=>$data['classTypeName'],':class_type_id'=>$data['classTypeId']]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function delete($class_type_id){
        try{
            $sql = 'DELETE FROM t_class_types WHERE class_type_id = :class_type_id';
            $stmt = DB::getConnection()->prepare($sql);
            $stmt->execute([':class_type_id' => $class_type_id]);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}