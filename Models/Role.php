<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 24/10/19
 * Time: 12:58 AM
 */

namespace Models;


use Connection\DB;
use PDOException;

class Role
{
    private $table = 't_roles';
    private $fields = ['role_id','role_name'];

    public static function all(){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_roles");
            $result = $stmt->execute();
            if (!$result){
                throwError('Error notified from Role model at line :'.__LINE__);
            }
            $AllRows = [];
            while ($row = $stmt->fetch()){
                $AllRows[] = $row;
            }
            return $AllRows;
        } catch (PDOException $e){
            echo 'Error notified from Role model at line :'.__LINE__;
            throwError($e->getMessage());
        }
    }

    public static function insert($data){
        try{
            $sql = "INSERT INTO t_roles (role_name) VALUES (?)";
            $stmt= DB::getConnection()->prepare($sql);
            $result = $stmt->execute([$data['roleName']]);
            if (!$result){
                throwError('Error notified from Role model at line :'.__LINE__);
            }
            return true;
        } catch (PDOException $e){
            echo 'Error notified from Role model at line :'.__LINE__;
            throwError($e->getMessage());
        }
    }

    public static function select($role_id){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_roles WHERE role_id = :role_id LIMIT 1");
            $result = $stmt->execute([':role_id' => $role_id]);
            if (!$result){
                throwError('Error notified from Role model at line :'.__LINE__);
            }
            return $stmt->fetch();
        } catch (PDOException $e){
            echo 'Error notified from Role model at line :'.__LINE__;
            throwError($e->getMessage());
        }
    }

    public static function update($data){
        try{
            $sql = "UPDATE t_roles SET role_name=:role_name WHERE role_id=:role_id";
            $stmt= DB::getConnection()->prepare($sql);
            $result = $stmt->execute([':role_name'=>$data['roleName'],':role_id'=>$data['roleId']]);
            if (!$result){
                throwError('Error notified from Role model at line :'.__LINE__);
            }
        } catch (PDOException $e){
            echo 'Error notified from Role model at line :'.__LINE__;
            throwError($e->getMessage());
        }
    }

    public static function delete($role_id){
        try{
            $sql = 'DELETE FROM t_roles WHERE role_id = :role_id';
            $q = DB::getConnection()->prepare($sql);
            $result = $q->execute([':role_id' => $role_id]);
            if (!$result){
                throwError('Error notified from Role model at line :'.__LINE__);
            }
        } catch (PDOException $e) {
            echo 'Error notified from Role model at line :'.__LINE__;
            throwError($e->getMessage());
        }
    }
}