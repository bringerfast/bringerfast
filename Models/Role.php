<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 24/10/19
 * Time: 12:58 AM
 */

namespace Models;


use Connection\DB;
use Throwable;

class Role
{
    private $table = 't_roles';
    private $fields = ['role_id','role_name'];

    public static function all(){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_roles");
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
            $sql = "INSERT INTO t_roles (role_name) VALUES (?)";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([$data['roleName']]);
            return true;
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function select($role_id){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_roles WHERE role_id = :role_id LIMIT 1");
            $stmt->execute([':role_id' => $role_id]);
            return $stmt->fetch();
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function update($data){
        try{
            $sql = "UPDATE t_roles SET role_name=:role_name WHERE role_id=:role_id";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([':role_name'=>$data['roleName'],':role_id'=>$data['roleId']]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function delete($role_id){
        try{
            $sql = 'DELETE FROM t_roles WHERE role_id = :role_id';
            $stmt = DB::getConnection()->prepare($sql);
            $stmt->execute([':role_id' => $role_id]);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}