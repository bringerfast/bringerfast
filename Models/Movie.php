<?php
/**
 * Created by PhpStorm.
 * User: Banu
 * Date: 25/10/19
 * Time: 3:38 AM
 */

namespace Models;


use Classes\Model;

class Movie extends Model
{
    protected $table = 't_movies';
    protected $primaryKey = 'movie_id';
    protected $fields = ['r_movie_category_id','name','release_date','actor','actress','producer','director','duration','description','banner_image','list_image'];

}