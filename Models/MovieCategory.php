<?php
/**
 * Created by PhpStorm.
 * User: banu
 * Date: 25/10/19
 * Time: 2:37 AM
 */

namespace Models;


use Connection\DB;
use Throwable;

class MovieCategory
{
    private $table = 't_movie_categries';
    private $fields = ['movie_category_id','movie_category_name'];

    public static function all(){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_movie_categories");
            $stmt->execute();
            $AllRows = [];
            while ($row = $stmt->fetch()){
                $AllRows[] = $row;
            }
            return $AllRows;
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function insert($data){
        try{
            $sql = "INSERT INTO t_movie_categories (movie_category_name) VALUES (?)";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([$data['movieCategoryName']]);
            return true;
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function select($movie_category_id){
        try{
            $stmt = DB::getConnection()->prepare("SELECT * FROM t_movie_categories WHERE movie_category_id = :movie_category_id LIMIT 1");
            $stmt->execute([':movie_category_id' => $movie_category_id]);
            return $stmt->fetch();
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function update($data){
        try{
            $sql = "UPDATE t_movie_categories SET movie_category_name=:movie_category_name WHERE movie_category_id=:movie_category_id";
            $stmt= DB::getConnection()->prepare($sql);
            $stmt->execute([':movie_category_name'=>$data['movieCategoryName'],':movie_category_id'=>$data['movieCategoryId']]);
        } catch (Throwable $e){
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }

    public static function delete($movie_category_id){
        try{
            $sql = 'DELETE FROM t_movie_categories WHERE movie_category_id = :movie_category_id';
            $stmt = DB::getConnection()->prepare($sql);
            $stmt->execute([':movie_category_id' => $movie_category_id]);
        } catch (Throwable $e) {
            dd($e->getMessage()." at line ".$e->getLine()." in ".$e->getFile());
        }
    }
}