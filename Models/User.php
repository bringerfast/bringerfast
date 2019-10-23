<?php
namespace Models;

use Connection\DB;
use PDOException;

class User
{
    private $table = 't_users';
    private $fields = ['user_id','r_role_id','name','email','email_verified_at','password','mobile_number','status'];
    /**
     * @param $uname
     * @param $pass
     * @return bool
     * To verify user name and password
     */
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
}