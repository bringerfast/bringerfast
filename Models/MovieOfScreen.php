<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 7/11/19
 * Time: 4:59 PM
 */

namespace Models;


use Classes\Model;
use PDO;
use Connection\DB;
use Throwable;

class MovieOfScreen extends Model
{
    protected $table = 't_movie_of_screens';
    protected $primaryKey = 'movie_of_screen_id';
    protected $fields = ['r_theatre_id','r_screen_id','r_show_id','r_movie_id','date_time','available_seats'];

    public static function allWithRelation(){
        try{
            $child = get_called_class();
            $object = new $child();
            $stmt = DB::getConnection()->prepare("
            SELECT t_movie_of_screens.*,t_theatres.*,t_screens.*,t_shows.*,t_movies.*
            FROM t_movie_of_screens
            INNER JOIN t_theatres ON theatre_id = r_theatre_id
            INNER JOIN t_screens ON screen_id = r_screen_id
            INNER JOIN t_shows ON show_id = r_show_id
            INNER JOIN t_movies ON movie_id = r_movie_id");
            $stmt->execute();
            $objects = [];
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)){
                $tempObject = new $child();
                foreach ($data as $key => $value){
                    $tempObject->$key = $value;
                }
                array_push($objects,$tempObject);
            }
            $object->objects = $objects;
            return $object;
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function selectWithRelation($movie_of_screen_id){
        try{
            $child = get_called_class();
            $object = new $child();
            $stmt = DB::getConnection()->prepare(" 
              SELECT t_movie_of_screens.*,t_theatres.*,t_screens.*,t_shows.*,t_movies.*
              FROM t_movie_of_screens
              INNER JOIN t_theatres ON theatre_id = r_theatre_id
              INNER JOIN t_screens ON screen_id = r_screen_id
              INNER JOIN t_shows ON show_id = r_show_id
              INNER JOIN t_movies ON movie_id = r_movie_id
              WHERE movie_of_screen_id = :movie_of_screen_id LIMIT 1"
            );
            $stmt->execute([':movie_of_screen_id' => $movie_of_screen_id]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            foreach ($data as $key => $value){
                $object->$key = $value;
            }
            return $object;
        } catch (Throwable $e){
            throwError($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}