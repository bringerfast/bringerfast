<?php
namespace Models;

use Classes\Model;
use Connection\DB;
use Throwable;

class User extends Model
{
    protected $table = 't_users';
    protected $primaryKey = 'user_id';
    protected $fields = ['r_role_id','name','email','email_verified_at','password','mobile','status'];

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
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}