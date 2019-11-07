<?php
namespace Models;

use Classes\Model;

class User extends Model
{
    protected $table = 't_users';
    protected $primaryKey = 'user_id';
    protected $fields = ['r_role_id','name','email','email_verified_at','password','mobile','status'];
}