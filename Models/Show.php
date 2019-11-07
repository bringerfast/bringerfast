<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 31/10/19
 * Time: 3:05 AM
 */

namespace Models;


use Classes\Model;

class Show extends Model
{
    protected $table = 't_shows';
    protected $primaryKey = 'show_id';
    protected $fields = ['show_name'];
}