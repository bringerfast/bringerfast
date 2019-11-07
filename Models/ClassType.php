<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 31/10/19
 * Time: 2:09 AM
 */

namespace Models;

use Classes\Model;

class ClassType extends Model
{
    protected $table = 't_class_types';
    protected $primaryKey = 'class_type_id';
    protected $fields = ['class_type_name'];
}