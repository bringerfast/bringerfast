<?php
namespace Models;

use Connection\DB;
use PDOException;

class User
{
    private $table = 't_users';
    private $fields = ['user_id','r_role_id','name','email','email_verified_at','password','mobile','status'];

    public static function adminAuth($email,$password){
        try{
          $stmt = DB::getConnection()->prepare("
              SELECT users.r_role_id, users.* ,roles.* FROM t_users as users
              INNER JOIN t_roles as roles
              ON users.r_role_id = roles.role_id
              WHERE email=:email AND password=:password AND users.r_role_id = roles.role_id LIMIT 1
          ");
            $stmt->execute(['email' => $email,'password' => $password]);
            return $stmt->fetch();
        } catch (PDOException $e){
            echo "Error on user model auth function :".$e->getMessage();
        }
    }

    public static function all(){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_users");
            $stmt->execute();
            $AllRows = [];
            while ($row = $stmt->fetch()){
                $AllRows[] = $row;
            }
            return $AllRows;
        } catch (PDOException $e){
            echo "Error on User all function :".$e->getMessage();
        }
    }

    public static function insert($data){
        try{
            $sql = "INSERT INTO t_users (r_role_id,name,email,password,mobile,status) 
                    VALUES (:r_role_id,:name,:email,:password,:mobile_number,:status)";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([
                ':r_role_id'=>$data['userRole'],
                ':name'=>$data['userName'],
                ':email'=>$data['userEmail'],
                ':password'=>$data['userMobile'],
                ':mobile_number'=>$data['userPassword'],
                ':status'=>$data['userStatus']
            ]);
        } catch (PDOException $e){
            echo "Error on User insert function :".$e->getMessage();
        }
    }

    public static function select($user_id){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_users WHERE user_id = :user_id LIMIT 1");
            $stmt->execute([':user_id' => $user_id]);
            return $stmt->fetch();
        } catch (PDOException $e){
            echo "Error on user model auth function :".$e->getMessage();
        }
    }

    public static function update($data){
        try{
            $sql = "UPDATE t_roles SET role_name=:role_name WHERE role_id=:role_id";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([':role_name'=>$data['roleName'],':role_id'=>$data['roleId']]);
        } catch (PDOException $e){
            echo "Error on user model auth function :".$e->getMessage();
        }
    }

    public static function delete($user_id){
        $sql = 'DELETE FROM t_users WHERE user_id = :user_id';
        $q = DB::getConnection()->prepare($sql);
        return $q->execute([':user_id' => $user_id]);
    }
}