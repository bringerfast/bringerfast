<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 25/10/19
 * Time: 2:37 AM
 */

namespace Models;


use Classes\Model;

class MovieCategory extends Model
{
    protected $table = 't_movie_categories';
    protected $primaryKey = 'movie_category_id';
    protected $fields = ['movie_category_name'];

}