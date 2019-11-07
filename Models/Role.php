<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 24/10/19
 * Time: 12:58 AM
 */

namespace Models;


use Classes\Model;
use Connection\DB;
use Throwable;

class Role extends Model
{
    protected $table = 't_roles';
    protected $primaryKey = 'role_id';
    protected $fields = ['role_name'];

}