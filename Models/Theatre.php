<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 31/10/19
 * Time: 3:39 AM
 */

namespace Models;

use Classes\Model;
use Connection\DB;
use Throwable;
class Theatre extends Model
{
    protected $table = 't_theatres';
    protected $primaryKey = 'theatre_id';
    protected $fields = ['r_user_id','theatre_name','address','contact'];

}